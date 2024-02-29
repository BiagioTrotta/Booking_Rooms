<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{

    public function create(Request $request)
    {
        $title = 'Add Reservation';
        $clients = Client::all();
        $rooms = Room::all();
        $selectedClient = $request->input('selectedClient');
        $selectedRoom = $request->input('selectedRoom');
        $dateRange = $request->input('dateRange');


        // Inizializza le variabili $startDate e $endDate con valori predefiniti
        $startDate = null;
        $endDate = null;
        $formattedDateRange = null;

        // Verifica se è stato selezionato un intervallo di date
        if ($dateRange && strpos($dateRange, ' to ') !== false) {
            [$startDate, $endDate] = explode(' to ', $dateRange);

            // Verifica che l'array generato da explode contenga almeno due elementi
            if (count([$startDate, $endDate]) >= 2) {
                // Verifica che la data di fine sia successiva alla data di inizio
                if (Carbon::parse($endDate)->lt(Carbon::parse($startDate))) {
                    // Se la data di fine è precedente alla data di inizio, scambiale
                    [$startDate, $endDate] = [$endDate, $startDate];
                }

                // Verifica se la data di inizio e la data di fine sono uguali
                if ($startDate === $endDate) {
                    // Se sono uguali, aggiungi un giorno alla data di fine
                    $endDate = Carbon::parse($endDate)->addDay()->format('Y-m-d');
                }
            }
        }

        // Ottenere il mese dell'intervallo selezionato
        if ($startDate && $endDate) {
            $selectedMonth = Carbon::parse($startDate)->format('F Y');
        } else {
            $selectedMonth = Carbon::now()->format('F Y'); // Imposta il mese attuale come predefinito se non è stato selezionato alcun intervallo di date
        }

        // Imposta la data di fine su fine dell'anno corrente se non specificata
        if (!$endDate) {
            $endDate = Carbon::now()->endOfYear()->format('d-m-Y');
        }

        $query = Reservation::with(['client', 'room'])
            ->orderBy('check_in')
            ->orderBy('room_id');

        if ($startDate && $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('check_in', '>=', $startDate)
                    ->where('check_out', '<=', $endDate);
            });
        }

        if ($selectedClient) {
            $query->where('client_id', $selectedClient);
        }

        if ($selectedRoom) {
            $query->whereHas('room', function ($query) use ($selectedRoom) {
                $query->where('id', $selectedRoom);
            });
        }


        $reservations = $query->get();

        return view('reservations.create', compact('title', 'clients', 'rooms', 'reservations', 'selectedMonth', 'selectedClient', 'selectedRoom', 'dateRange'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "client_id"  => [
                'required',
            ],
            "room_id" => [
                'required',
            ],
            'check_in' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'check_out' => [
                'required',
                'date',
                'after:check_in',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'beds' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0.00',
                'max:999.00',
            ],
        ]);

        $client_id = $request->input('client_id');
        $room_id = $request->input('room_id');
        $beds = $request->input('beds');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $price = $request->input('price');

        // Calcola il prezzo totale in base al prezzo per notte e al numero di notti prenotate
        $start = Carbon::parse($check_in);
        $end = Carbon::parse($check_out);
        $nights = $end->diffInDays($start);
        $price_tot = $price * $nights;

        $existingReservation = Reservation::where('room_id', $room_id)
            ->where(function ($query) use ($check_in, $check_out) {
                $query->where(function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '>=', $check_in)
                        ->where('check_in', '<', $check_out);
                })->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('check_out', '>', $check_in)
                        ->where('check_out', '<=', $check_out);
                })->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '<', $check_in)
                        ->where('check_out', '>', $check_out);
                });
            })
            ->first();

        if ($existingReservation) {
            return redirect()->back()->withErrors(['message' => 'La camera è già prenotata per questo intervallo di date.']);
        }

        Reservation::create([
            'client_id' => $client_id,
            'room_id' => $room_id,
            'beds' => $beds,
            'check_in' => $check_in,
            'check_out' => $check_out,'price' => $price,
            'price_tot' => $price_tot, // Salva il prezzo totale calcolato
        ]);

        return redirect()->route('reservation.create')->with('success', 'Prenotazione effettuata con successo!');
    }

    public function togglePaymentStatus($reservationId)
    {
        $reservation = Reservation::find($reservationId);

        if ($reservation) {
            // Cambia lo stato del pagamento
            $reservation->paid = !$reservation->paid;
            $reservation->save();
        }

        if ($reservation->paid) {
            return redirect()->back()->with('success', 'Prenotazione pagata!');
        } else {
            return redirect()->back()->with('success', 'Prenotazione da pagare!');
        };
    }

    public function edit($id)
    {
        $title = 'Edit Reservation';
        $clients = Client::all();
        $rooms = Room::all();
        $reservation = Reservation::findOrFail($id);

        return view('reservations.edit', compact('title', 'clients', 'rooms', 'reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'client_id' => 'required',
            'room_id' => 'required',
            'check_in' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'check_out' => [
                'required',
                'date',
                'after:check_in',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'beds' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],
        ]);

        $client_id = $request->input('client_id');
        $room_id = $request->input('room_id');
        $beds = $request->input('beds');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');

        $existingReservation = Reservation::where('room_id', $room_id)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($check_in, $check_out) {
                $query->where(function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '>=', $check_in)
                        ->where('check_in', '<', $check_out);
                })->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('check_out', '>', $check_in)
                        ->where('check_out', '<=', $check_out);
                })->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '<', $check_in)
                        ->where('check_out', '>', $check_out);
                });
            })
            ->first();

        if ($existingReservation) {
            return redirect()->back()->withErrors(['message' => 'La camera è già prenotata per questo intervallo di date.']);
        }

        $request->validate([
            'check_in' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'check_out' => [
                'required',
                'date',
                'after:check_in',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'beds' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0.00',
                'max:999.00',
            ],
        ]);

        $client_id = $request->input('client_id');
        $room_id = $request->input('room_id');
        $beds = $request->input('beds');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $price = $request->input('price');

        // Calcola il prezzo totale in base al prezzo per notte e al numero di notti prenotate
        $start = Carbon::parse($check_in);
        $end = Carbon::parse($check_out);
        $nights = $end->diffInDays($start);
        $price_tot = $price * $nights;

        $reservation->update([
            'client_id' => $client_id,
            'room_id' => $room_id,
            'beds' => $beds,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'price' => $price,
            'price_tot' => $price_tot,
        ]);

        return redirect()->route('reservation.create')->with('success', 'Prenotazione aggiornata con successo!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Prenotazione eliminata con successo!');
    }


}
