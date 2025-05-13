<div>
    <div class="container py-4">
        <!-- Filtro Prenotazioni -->
        <div class="card shadow-lg border-0 rounded-3 overflow-hidden mb-5">
            <div class="card-header bg-primary bg-gradient text-white p-3">
                <h2 class="h4 mb-0 d-flex align-items-center">
                    <i class="fa-solid fa-filter me-2"></i> Filtra Prenotazioni
                </h2>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('reservation.create') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="dateRange" name="dateRange" class="form-control" placeholder="Seleziona intervallo" value="{{ old('dateRange', $dateRange) }}">
                                <label for="dateRange">
                                    <i class="fa-solid fa-calendar-days me-1 text-primary"></i> Seleziona Intervallo
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <select name="selectedClient" id="selectedClient" class="form-select">
                                    <option value="">Tutti i Clienti</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $selectedClient ? 'selected' : '' }}>
                                        {{ $client->lastname }} {{ $client->firstname }}
                                    </option>
                                    @endforeach
                                </select>
                                <label for="selectedClient">
                                    <i class="fa-solid fa-user me-1 text-primary"></i> Seleziona Cliente
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <select name="selectedRoom" id="selectedRoom" class="form-select">
                                    <option value="">Tutte le Camere</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" {{ $room->id == $selectedRoom ? 'selected' : '' }}>
                                        {{ $room->room_number }}
                                    </option>
                                    @endforeach
                                </select>
                                <label for="selectedRoom">
                                    <i class="fa-solid fa-door-closed me-1 text-primary"></i> Seleziona Camera
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <select name="paid" id="paid" class="form-select">
                                    <option value="" selected>Tutti</option>
                                    <option value="1">Pagato</option>
                                    <option value="0">Non Pagato</option>
                                </select>
                                <label for="paid">
                                    <i class="fa-solid fa-credit-card me-1 text-primary"></i> Stato Pagamento
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-2 justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-filter me-2"></i> Filtra
                        </button>
                        <a href="{{ route('reservation.create') }}" class="btn btn-outline-secondary px-4">
                            <i class="fa-solid fa-rotate me-2"></i> Resetta
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabella Prenotazioni -->
        <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
            <div class="card-header bg-primary bg-gradient text-white p-3 d-flex justify-content-between align-items-center">
                @if ($dateRange)
                <h2 class="h4 mb-0 d-flex align-items-center">
                    <i class="fa-solid fa-calendar-check me-2"></i> Prenotazioni - {{ \Carbon\Carbon::parse(explode(' to ', $dateRange)[0])->format('F') }}
                </h2>
                @else
                <h2 class="h4 mb-0 d-flex align-items-center">
                    <i class="fa-solid fa-calendar-check me-2"></i> Tutte le Prenotazioni
                </h2>
                @endif
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-user me-2 text-primary"></i> Clienti
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-door-closed me-2 text-primary"></i> N. Camera
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-bed me-2 text-primary"></i> P. Letto
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-calendar-day me-2 text-primary"></i> Check-in
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-calendar-day me-2 text-primary"></i> Check-out
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-euro-sign me-2 text-primary"></i> Prezzo notte
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-euro-sign me-2 text-primary"></i> Prezzo totale
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-clock me-2 text-primary"></i> Data creazione
                                    </div>
                                </th>
                                <th class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-credit-card me-2 text-primary"></i> Pagamento
                                    </div>
                                </th>
                                <th class="px-3 py-3 text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-gears me-2 text-primary"></i> Azioni
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="fa-solid fa-user text-primary"></i>
                                        </div>
                                        <div>{{ $reservation->client->lastname }} {{ $reservation->client->firstname }}</div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="badge bg-secondary">{{ $reservation->room->room_number }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    @for ($i = 0; $i < $reservation->beds; $i++)
                                        <i class="fa-solid fa-jar fa-sm text-primary"></i>
                                        @endfor
                                </td>
                                <td class="px-3 py-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                        {{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                        {{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="px-3 py-3 fw-semibold">€ {{ $reservation->price }}</td>
                                <td class="px-3 py-3 fw-bold text-primary">€ {{ $reservation->price_tot }}</td>
                                <td class="px-3 py-3 text-muted small">
                                    {{ \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $reservation->formatted_created_at)->diffForHumans() }}
                                </td>
                                <td class="px-3 py-3">
                                    <livewire:toggle-payment :reservationId="$reservation->id" />
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa prenotazione?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-light p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        <i class="fa-solid fa-circle-info me-1"></i>
                        Prenotazioni totali: {{ $reservations->total() }}
                    </div>
                    <div class="pagination-container">
                        {{ $reservations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>