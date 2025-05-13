<x-main>
    <x-slot:title>Edit Reservation</x-slot:title>
    <div class="container py-4">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('reservation.create') }}" class="btn btn-outline-primary d-flex align-items-center">
                <i class="fa-solid fa-arrow-left me-2"></i> Indietro
            </a>
            <h1 class="h3 mb-0 ms-3">Modifica Prenotazione</h1>
        </div>

        @if ($errors->any())
        <x-error-messages :errors="$errors" />
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-primary bg-gradient text-white p-3">
                        <h2 class="h4 mb-0 d-flex align-items-center">
                            <i class="fa-solid fa-calendar-pen me-2"></i> Dettagli Prenotazione
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="client_id" id="client_id" class="form-select" required>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ $client->id == $reservation->client_id ? 'selected' : '' }}>
                                                {{ $client->lastname }} {{ $client->firstname }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="client_id">
                                            <i class="fa-solid fa-user me-1 text-primary"></i> Cliente
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="room_id" id="room_id" class="form-select" required>
                                            @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}" {{ $room->id == $reservation->room_id ? 'selected' : '' }}>
                                                {{ $room->room_number }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="room_id">
                                            <i class="fa-solid fa-door-closed me-1 text-primary"></i> Camera
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', $reservation->beds) }}" min="1" max="5" required>
                                        <label for="beds">
                                            <i class="fa-solid fa-bed me-1 text-primary"></i> Numero Letti
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="check_in" id="check_in" class="form-control" value="{{ $reservation->check_in }}" required>
                                        <label for="check_in">
                                            <i class="fa-solid fa-calendar-day me-1 text-primary"></i> Check-in
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="check_out" id="check_out" class="form-control" value="{{ $reservation->check_out }}" required>
                                        <label for="check_out">
                                            <i class="fa-solid fa-calendar-day me-1 text-primary"></i> Check-out
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $reservation->price }}" required>
                                        <label for="price">
                                            <i class="fa-solid fa-euro-sign me-1 text-primary"></i> Prezzo per notte
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('reservation.create') }}" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-xmark me-2"></i> Annulla
                                </a>
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fa-solid fa-floppy-disk me-2"></i> Salva Modifiche
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-muted">
                                <i class="fa-solid fa-circle-info me-1"></i>
                                Ultima modifica: {{ \Carbon\Carbon::parse($reservation->updated_at)->format('d/m/Y H:i') }}
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary me-2">ID: {{ $reservation->id }}</span>
                                <span class="badge {{ $reservation->paid ? 'bg-success' : 'bg-danger' }}">
                                    {{ $reservation->paid ? 'Pagato' : 'Non Pagato' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4 border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                                <i class="fa-solid fa-calculator text-primary"></i>
                            </div>
                            <div>
                                <h3 class="h5 mb-1">Riepilogo Prenotazione</h3>
                                <p class="mb-0 text-muted">
                                    Durata soggiorno:
                                    <span class="fw-semibold">
                                        {{ \Carbon\Carbon::parse($reservation->check_in)->diffInDays(\Carbon\Carbon::parse($reservation->check_out)) }} notti
                                    </span>
                                </p>
                                <p class="mb-0 text-muted">
                                    Prezzo totale:
                                    <span class="fw-bold text-primary">
                                        € {{ $reservation->price_tot }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>