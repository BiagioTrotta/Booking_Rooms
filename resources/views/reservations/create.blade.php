<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mb-5">
        <h1 class="bg-dark text-white">Nuova Prenotazione</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form class="row" action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="form-group col-4">
                <label for="client_id">Cliente</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->lastname }} {{ $client->firstname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-4">
                <label for="room_id">Camera</label>
                <select name="room_id" id="room_id" class="form-control">
                    @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-4">
                <label for="beds">Numero Letti</label>
                <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', '1') }}" min="1" max="5">
            </div>
            <div class="form-group col-4">
                <label for="check_in">Check-in</label>
                <input type="date" name="check_in" id="check_in" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="form-group col-4">
                <label for="check_out">Check-out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
            </div>
            <div class="form-group col-4">
                <label for="price">Prezzo a notte</label>
                <input type="number" step="0.00" name="price" id="price" class="form-control" value="{{ old('price', '0.00') }}" min="0">
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary mt-3 w-25">Prenota</button>
            </div>
        </form>
    </div>

    <div class="container mb-5">
        <!-- <h1>Filtra per Mese e Intervallo di Date</h1>
        <form class="row" action="{{ route('reservation.create') }}" method="GET">
            <div class="form-group col-3">
                <label for="selectedMonth">Seleziona Mese:</label>
                <input type="month" name="selectedMonth" id="selectedMonth" value="{{ $selectedMonth }}">
            </div>
            <div class="form-group col-3">
                <label for="startDate">Data Inizio:</label>
                <input type="date" name="startDate" id="startDate" class="form-control">
            </div>
            <div class="form-group col-3">
                <label for="endDate">Data Fine:</label>
                <input type="date" name="endDate" id="endDate" class="form-control">
            </div> -->
        <!-- <h1>Filtra Prenotazioni</h1>
        <form class="row" action="{{ route('reservation.create') }}" method="GET">
            <div class="form-group col-12">
                <label for="selectedMonth">Seleziona Mese:</label>
                <br>
                <input type="month" name="selectedMonth" id="selectedMonth" value="{{ $selectedMonth }}">
            </div>
            @php
            $startDay = isset($startDay) ? $startDay : null;
            $endDay = isset($endDay) ? $endDay : null;
            @endphp
            <div class="form-group col-6">
                <label for="startDay">Giorno Inizio:</label>
                <select name="startDay" id="startDay" class="form-control">
                    <option value="">Seleziona giorno</option>
                    @for ($day = 1; $day <= Carbon\Carbon::parse($selectedMonth)->daysInMonth; $day++)
                        <option value="{{ $day }}" {{ $day == $startDay ? 'selected' : '' }}>{{ $day }}</option>
                        @endfor
                </select>
            </div>
            <div class="form-group col-6">
                <label for="endDay">Giorno Fine:</label>
                <select name="endDay" id="endDay" class="form-control">
                    <option value="">Seleziona giorno</option>
                    @for ($day = 1; $day <= Carbon\Carbon::parse($selectedMonth)->daysInMonth; $day++)
                        <option value="{{ $day }}" {{ $day == $endDay ? 'selected' : '' }}>{{ $day }}</option>
                        @endfor
                </select>
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
            <div class="col-12 d-flex align-items-end">
                <button type="submit" class="btn btn-primary mt-3 w-100">Filtra</button>
                <a href="{{ route('reservation.create') }}" class="btn btn-secondary mt-3 w-100">Reset</a>
            </div>
        </form> -->

        <!-- Selettore delle date con Flatpickr -->
        <h1 class="bg-dark text-white">Filtra Prenotazioni</h1>
        <form class="row" action="{{ route('reservation.create') }}" method="GET">
            <!-- ... altri campi del form ... -->
            <div class="form-group col-12 d-flex flex-column align-items-center justify-content-center">
                <label for="startDate">Seleziona Intervallo:</label>
                <input type="text" class="w-50" id="dateRange" name="dateRange" class="form-control" placeholder="Seleziona intervallo">
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
        <h1>Reservations - {{ \Carbon\Carbon::parse(explode(' to ', $dateRange)[0])->format('F') }}</h1>
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

    <script>
        // Inizializza Flatpickr per la selezione dell'intervallo di date
        const dateRangePicker = flatpickr('#dateRange', {
            mode: 'range', // Imposta la modalità di intervallo
            dateFormat: 'Y-m-d', // Formato della data
            // ... altre opzioni personalizzate se necessario ...
        });
    </script>

</x-main>