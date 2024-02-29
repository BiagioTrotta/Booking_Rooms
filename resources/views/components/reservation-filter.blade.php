<div>
    <div class="container mb-5">
        <!-- Selettore delle date con Flatpickr -->
        <h1 class="bg-dark text-white">Filtra Prenotazioni</h1>
        <form class="row" action="{{ route('reservation.create') }}" method="GET">
            <!-- ... altri campi del form ... -->
            <div class="form-group col-12 d-flex flex-column align-items-center justify-content-center">
                <label for="startDate">Seleziona Intervallo:</label>
                <input type="text" class="w-50" id="dateRange" name="dateRange" class="form-control" placeholder="Seleziona intervallo" value="{{ old('dateRange', $dateRange) }}">
            </div>
            <div class="form-group col-6">
                <label for="selectedClient">Seleziona Cliente:</label>
                <select name="selectedClient" id="selectedClient" class="form-control">
                    <option value="">Tutti i Clienti</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $selectedClient ? 'selected' : '' }}>
                        {{ $client->lastname }} {{ $client->firstname }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="selectedRoom">Seleziona Camera:</label>
                <select name="selectedRoom" id="selectedRoom" class="form-control">
                    <option value="">Tutte le Camere</option>
                    @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $selectedRoom ? 'selected' : '' }}>
                        {{ $room->room_number }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 d-flex align-items-end justify-content-center">
                <button type="submit" class="btn btn-primary mt-3 w-25">Filtra</button>
                <a href="{{ route('reservation.create') }}" class="btn btn-secondary mt-3 w-25">Reset</a>
            </div>
        </form>
    </div>

    <div class="container mb-5">
        @if ($dateRange)
        <h1 class="bg-dark text-white">Reservations - {{ \Carbon\Carbon::parse(explode(' to ', $dateRange)[0])->format('F') }}</h1>
        @else
        <h1 class="bg-dark text-white">Reservations - All</h1>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Nr. Room</th>
                        <th>Beds</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Price per night</th>
                        <th>Price total</th>
                        <th>Create Date</th>
                        <th>Action</th>
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
                        <td>{{ \Carbon\Carbon::parse($reservation->created_at)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('reservation.togglePaymentStatus', $reservation->id) }}" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $reservation->paid ? 'btn-success' : 'btn-danger' }}">
                                    {{ $reservation->paid ? 'Pagato' : 'Da pagare' }}
                                </button>
                            </form>

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
    </div>
</div>