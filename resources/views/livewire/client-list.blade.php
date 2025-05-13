<div class="container py-4">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary bg-gradient text-white p-3">
                    <h2 class="h4 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-users me-2"></i> Lista Clienti
                    </h2>
                </div>

                <div class="card-body p-4">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive rounded mt-3">
                        <table class="table table-hover align-middle border">
                            <thead class="table-light">
                                <tr>
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
                                    <th class="px-3 py-3 text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-gears me-2 text-primary"></i> Azioni
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($clienti as $client)
                                <tr>
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
                                    <td class="px-3 py-3 text-center">
                                        <button class="btn btn-sm btn-primary" wire:click="editClient({{ $client->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click="confirmClientDeletion({{$client->id}})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Mostra il messaggio di conferma solo se l'ID del cliente è stato confermato -->
                                @if ($confirmingClientId === $client->id)
                                <tr>
                                    <td colspan="4" class="bg-danger bg-opacity-10 p-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <button class="btn btn-sm btn-danger" wire:click="deleteClient({{$client->id}})">
                                                Cancella cliente: {{$client->lastname}} ?
                                            </button>
                                            <button class="btn btn-sm btn-secondary" wire:click="cancelConfirmation()">
                                                Annulla
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $clienti->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>