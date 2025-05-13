<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary bg-gradient text-white p-3">
                    <h1 class="h4 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-calendar-plus me-2"></i> Nuova Prenotazione
                    </h1>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="client_id" id="client_id" class="form-select" required>
                                        <option value="">Seleziona Cliente</option>
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->lastname }} {{ $client->firstname }}</option>
                                        @endforeach
                                    </select>
                                    <label for="client_id">
                                        <i class="fa-solid fa-user me-1 text-primary"></i> Cliente
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="room_id" id="room_id" class="form-select" required>
                                        <option value="">Seleziona Camera</option>
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                        @endforeach
                                    </select>
                                    <label for="room_id">
                                        <i class="fa-solid fa-door-closed me-1 text-primary"></i> Camera
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', '1') }}" min="1" max="5" required>
                                    <label for="beds">
                                        <i class="fa-solid fa-bed me-1 text-primary"></i> Posti letto
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="date" name="check_in" id="check_in" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    <label for="check_in">
                                        <i class="fa-solid fa-calendar-day me-1 text-primary"></i> Check-in
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="date" name="check_out" id="check_out" class="form-control" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" required>
                                    <label for="check_out">
                                        <i class="fa-solid fa-calendar-day me-1 text-primary"></i> Check-out
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', '0.00') }}" min="0" max="999" required>
                                    <label for="price">
                                        <i class="fa-solid fa-euro-sign me-1 text-primary"></i> Prezzo notte
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fa-solid fa-calendar-check me-2"></i> Prenota
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            <i class="fa-solid fa-circle-info me-1"></i>
                            Tutti i campi sono obbligatori
                        </div>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="fa-solid fa-arrow-left me-1"></i> Torna alle prenotazioni
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>