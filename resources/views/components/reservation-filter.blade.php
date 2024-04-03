<div>
    <div class="container mb-5">
        <!-- Selettore delle date con Flatpickr -->
        <form class="row bg-white shadow rounded" action="{{ route('reservation.create') }}" method="GET">
            <h1 class="bg-dark text-white rounded-top px-1">Filtra Prenotazioni</h1>
            <!-- ... altri campi del form ... -->
            <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="startDate" class="fw-bold">Seleziona Intervallo:</label>
                <input type="text" class="w-75" id="dateRange" name="dateRange" class="form-control" placeholder="Seleziona intervallo" value="{{ old('dateRange', $dateRange) }}">
            </div>
            <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="selectedClient" class="fw-bold">Seleziona Cliente:</label>
                <select name="selectedClient" id="selectedClient" class="form-control w-75">
                    <option value="">Tutti i Clienti</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $selectedClient ? 'selected' : '' }}>
                        {{ $client->lastname }} {{ $client->firstname }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="selectedRoom" class="fw-bold">Seleziona Camera:</label>
                <select name="selectedRoom" id="selectedRoom" class="form-control w-75">
                    <option value="">Tutte le Camere</option>
                    @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $selectedRoom ? 'selected' : '' }}>
                        {{ $room->room_number }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="paid" class="fw-bold">Stato Pagamento:</label>
                <select name="paid" id="paid" class="form-control w-75">
                    <option value="" selected>Tutti</option>
                    <option value="1">Pagato</option>
                    <option value="0">Non Pagato</option>
                </select>
            </div>
            <div class="col-12 d-flex align-items-end justify-content-center">
                <button type="submit" class="btn btn-primary my-3 w-25">Filtra</button>
                <a href="{{ route('reservation.create') }}" class="btn btn-secondary my-3 w-25">Resetta</a>
            </div>
        </form>
    </div>

    <div class="container mb-5">
        @if ($dateRange)
        <h1 class="bg-dark text-white rounded px-1">Prenotazioni - {{ \Carbon\Carbon::parse(explode(' to ', $dateRange)[0])->format('F') }}</h1>
        @else
        <h1 class="bg-dark text-white rounded px-1">Tutte le Prenotazioni</h1>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Clienti</th>
                        <th>N. Camera</th>
                        <th>P. Letto</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Prezzo notte</th>
                        <th>Prezzo totale</th>
                        <th>Data crezione</th>
                        <th>Pagamento</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->client->lastname }} {{ $reservation->client->firstname }}</td>
                        <td>{{ $reservation->room->room_number }}</td>
                        <td>
                            @for ($i = 0; $i < $reservation->beds; $i++)
                                <i class="fa-solid fa-jar fa-sm"></i>
                                @endfor
                        </td>
                        <td>{{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}</td>
                        <td>€ {{ $reservation->price }}</td>
                        <td>€ {{ $reservation->price_tot }}</td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $reservation->formatted_created_at)->diffForHumans() }}
                        </td>
                        <td><livewire:toggle-payment :reservationId="$reservation->id" /></td>
                        <td>
                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa prenotazione?')"><i class="fa-solid fa-trash fa-sm"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($dateRange)
        <h1 class="bg-dark text-white">Reservations - {{ \Carbon\Carbon::parse(explode(' to ', $dateRange)[0])->format('F') }}</h1>
        @endif
        <div class="d-flex justify-content-center">
            {{ $reservations->links() }} <!-- Aggiunge i link di paginazione -->
        </div>
    </div>