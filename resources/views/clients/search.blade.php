<x-main>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-primary bg-gradient text-white p-3 d-flex justify-content-between align-items-center">
                        <h2 class="h4 mb-0 d-flex align-items-center">
                            <i class="fa-solid fa-users me-2"></i> {{ $title }}
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="mb-4">
                            <form action="{{ route('clients.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" id="search" class="form-control form-control-lg shadow-sm" placeholder="Cerca cliente..." aria-label="Search">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i> Cerca
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive rounded">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-3 py-3">#ID</th>
                                        <th class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-user me-2 text-primary"></i> Cognome
                                            </div>
                                        </th>
                                        <th class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-user me-2 text-primary"></i> Nome
                                            </div>
                                        </th>
                                        <th class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-phone me-2 text-primary"></i> Numero
                                            </div>
                                        </th>
                                        <th class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-envelope me-2 text-primary"></i> Email
                                            </div>
                                        </th>
                                        <th class="px-3 py-3 text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-gears me-2 text-primary"></i> Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td class="px-3 py-3">
                                            <span class="badge bg-secondary">{{ $client->id }}</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <a href="{{ route('clients.show', $client->id) }}" class="text-decoration-none fw-semibold text-primary">
                                                {{ $client->lastname }}
                                            </a>
                                        </td>
                                        <td class="px-3 py-3">{{ $client->firstname }}</td>
                                        <td class="px-3 py-3">
                                            <span class="badge bg-light text-dark border">
                                                <i class="fa-solid fa-phone me-1"></i>
                                                {{ $client->phone }}
                                            </span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <a href="mailto:{{ $client->email }}" class="text-decoration-none text-muted">
                                                <i class="fa-solid fa-envelope me-1 small"></i>
                                                {{ $client->email }}
                                            </a>
                                        </td>
                                        <td class="px-3 py-3 text-center">
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-magnifying-glass me-1"></i>
                                                <span class="d-none d-md-inline">Dettagli</span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $clients->links() }}
                        </div>

                        @if($clients->isEmpty())
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fa-solid fa-users-slash text-secondary" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="h5 text-secondary">Nessun cliente trovato</h3>
                            <p class="text-muted">La ricerca non ha prodotto risultati. Prova con altri termini.</p>
                        </div>
                        @endif
                    </div>

                    <div class="card-footer bg-light p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-muted">
                                <i class="fa-solid fa-circle-info me-1"></i>
                                Clienti totali: {{ $clients->total() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>