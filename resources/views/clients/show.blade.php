<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-4">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.clients') }}" class="btn btn-outline-primary d-flex align-items-center">
                <i class="fa-solid fa-arrow-left me-2"></i> Torna Indietro
            </a>
            <h1 class="h3 mb-0 ms-3">{{ $title }}</h1>
        </div>

        <div class="row">
            <!-- Dettagli Cliente -->
            <div class="col-md-9 mx-auto">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden mb-4">
                    <div class="card-header bg-primary bg-gradient text-white p-3">
                        <h5 class="card-title m-0 d-flex align-items-center">
                            <i class="fa-solid fa-user me-2"></i> Dettagli Cliente
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <div class="text-center mb-4">
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ Storage::url('public/media/placeholder.png') }}" alt="{{ $client->firstname }} {{ $client->lastname }}" class="rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                                        <span class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                    </div>
                                    <div class="mt-3">
                                        <h3 class="h4 mb-1">{{ $client->lastname }} {{ $client->firstname }}</h3>
                                        <span class="badge bg-secondary mb-3">ID #{{ $client->id }}</span>
                                    </div>
                                </div>

                                <div class="list-group list-group-flush">
                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Telefono</div>
                                            <div>{{ $client->phone }}</div>
                                        </div>
                                    </div>
                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Email</div>
                                            <div>
                                                <a href="mailto:{{ $client->email }}" class="text-decoration-none">{{ $client->email }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Informazioni Personali</h6>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Data di Nascita</div>
                                            <div>
                                                @if ($client->date_of_birth)
                                                {{ \Carbon\Carbon::parse($client->date_of_birth)->format('d/m/Y') }}
                                                @else
                                                <span class="text-muted">Non specificata</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Luogo di Nascita</div>
                                            <div>{{ $client->place_of_birth ?: 'Non specificato' }}</div>
                                        </div>
                                    </div>

                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-venus-mars"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Sesso</div>
                                            <div>{{ $client->gender ?: 'Non specificato' }}</div>
                                        </div>
                                    </div>

                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-id-card"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Documento d'Identità</div>
                                            <div>{{ $client->identity_document ?: 'Non specificato' }}</div>
                                        </div>
                                    </div>

                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-hashtag"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Numero Documento</div>
                                            <div>{{ $client->document_number ?: 'Non specificato' }}</div>
                                        </div>
                                    </div>

                                    <div class="list-group-item bg-transparent px-0 d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fa-solid fa-building-columns"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Luogo di Rilascio Documento</div>
                                            <div>{{ $client->document_issuing_place ?: 'Non specificato' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light p-3">
                        <div class="d-flex align-items-center text-muted small">
                            <i class="fa-regular fa-calendar me-2"></i>
                            <span>Creato il: {{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informazioni Gruppo -->
            @if($client->lastname_group_1 != null)
            <div class="col-md-9 mx-auto">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden mb-4">
                    <div class="card-header bg-primary bg-gradient text-white p-3">
                        <h5 class="card-title m-0 d-flex align-items-center">
                            <i class="fa-solid fa-users me-2"></i> Informazioni Gruppo
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="card h-100 border-primary border-opacity-25">
                                    <div class="card-header bg-primary bg-opacity-10 py-2">
                                        <h6 class="mb-0 text-primary">Gruppo 1</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Nome e Cognome</div>
                                                    <div>{{ $client->firstname_group_1 }} {{ $client->lastname_group_1 }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Data di Nascita</div>
                                                    <div>
                                                        @if ($client->date_of_birth_group_1)
                                                        {{ \Carbon\Carbon::parse($client->date_of_birth_group_1)->format('d/m/Y') }}
                                                        @else
                                                        <span class="text-muted">Non specificata</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Luogo di Nascita</div>
                                                    <div>{{ $client->place_of_birth_group_1 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-venus-mars"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Sesso</div>
                                                    <div>{{ $client->gender_group_1 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-id-card"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Documento</div>
                                                    <div>{{ $client->identity_document_group_1 ?: 'Non specificato' }}</div>
                                                    <div class="text-muted small mt-1">Numero: {{ $client->document_number_group_1 ?: 'Non specificato' }}</div>
                                                    <div class="text-muted small">Rilasciato a: {{ $client->document_issuing_place_group_1 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card h-100 border-primary border-opacity-25">
                                    <div class="card-header bg-primary bg-opacity-10 py-2">
                                        <h6 class="mb-0 text-primary">Gruppo 2</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Nome e Cognome</div>
                                                    <div>{{ $client->firstname_group_2 }} {{ $client->lastname_group_2 }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Data di Nascita</div>
                                                    <div>
                                                        @if ($client->date_of_birth_group_2)
                                                        {{ \Carbon\Carbon::parse($client->date_of_birth_group_2)->format('d/m/Y') }}
                                                        @else
                                                        <span class="text-muted">Non specificata</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Luogo di Nascita</div>
                                                    <div>{{ $client->place_of_birth_group_2 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-venus-mars"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Sesso</div>
                                                    <div>{{ $client->gender_group_2 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>

                                            <div class="list-group-item bg-transparent px-0 py-2 d-flex">
                                                <div class="me-3 text-primary">
                                                    <i class="fa-solid fa-id-card"></i>
                                                </div>
                                                <div>
                                                    <div class="text-muted small">Documento</div>
                                                    <div>{{ $client->identity_document_group_2 ?: 'Non specificato' }}</div>
                                                    <div class="text-muted small mt-1">Numero: {{ $client->document_number_group_2 ?: 'Non specificato' }}</div>
                                                    <div class="text-muted small">Rilasciato a: {{ $client->document_issuing_place_group_2 ?: 'Non specificato' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Prenotazioni -->
            <div class="col-md-9 mx-auto">
                @if ($client->reservations->count() > 0)
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden mb-4">
                    <div class="card-header bg-primary bg-gradient text-white p-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0 d-flex align-items-center">
                            <i class="fa-solid fa-calendar-check me-2"></i> Prenotazioni
                        </h5>
                        <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-chevron-down me-1"></i> Mostra/Nascondi
                        </button>
                    </div>

                    <div class="collapse" id="collapseExample">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle border">
                                    <thead class="table-light">
                                        <tr>
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
                                                    <i class="fa-solid fa-door-closed me-2 text-primary"></i> Camera
                                                </div>
                                            </th>
                                            <th class="px-3 py-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-euro-sign me-2 text-primary"></i> Prezzo a Notte
                                                </div>
                                            </th>
                                            <th class="px-3 py-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-euro-sign me-2 text-primary"></i> Prezzo Totale
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client->reservations as $reservation)
                                        <tr>
                                            <td class="px-3 py-3">
                                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_in)->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td class="px-3 py-3">
                                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_out)->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td class="px-3 py-3">
                                                <span class="badge bg-secondary px-3 py-2">
                                                    <i class="fa-solid fa-door-closed me-1"></i> {{ $reservation->room->room_number }}
                                                </span>
                                            </td>
                                            <td class="px-3 py-3 fw-semibold">{{ $reservation->price }} €</td>
                                            <td class="px-3 py-3 fw-bold text-primary">{{ $reservation->price_tot }} €</td>
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
                                    Prenotazioni totali: {{ $client->reservations->count() }}
                                </div>
                                <a href="{{ route('reservation.create') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa-solid fa-plus me-1"></i> Nuova Prenotazione
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-info-circle me-2"></i>
                    <div>Il cliente non ha prenotazioni.</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-main>