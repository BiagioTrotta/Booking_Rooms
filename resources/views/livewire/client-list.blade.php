<div>
    <h2>List Clients</h2>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($clienti as $client)
                <!-- Mostra il messaggio di conferma solo se l'ID del cliente è stato confermato -->
                @if ($confirmingClientId === $client->id)
                <button class="btn btn-sm btn-danger" wire:click="deleteClient({{$client->id}})">Conferma eliminazione ?</button>
                @endif
                <tr>
                    <td>{{ $client->id }}</td>
                    <td><i class="fa-solid fa-user"></i> <a href="{{ route('clients.show', $client->id) }}">{{ $client->lastname }}</a></td>
                    <td><i class="fa-solid fa-user"></i> {{ $client->firstname }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-dark fa" wire:click="editClient({{ $client->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- Aggiungi il pulsante di conferma eliminazione -->
                        <button class="btn btn-sm btn-danger fa" wire:click="confirmClientDeletion({{$client->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $clienti->links() }}
</div>