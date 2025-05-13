<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h2 class="fa mb-3">Lista Utenti <i class="fa-solid fa-users ms-2"></i></h2>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Admin</th>
                    <th scope="col" class="text-center">Manager</th>
                    <th scope="col" class="text-center">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($utenti as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <i class="fa-solid {{ $user->is_admin ? 'fa-check text-success' : 'fa-xmark text-danger' }}"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa-solid {{ $user->is_manager ? 'fa-check text-success' : 'fa-xmark text-danger' }}"></i>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Azioni utente">
                            <button class="btn btn-sm btn-outline-primary"
                                wire:click="editUser({{ $user->id }})"
                                title="Modifica">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger"
                                wire:click="deleteUser({{ $user->id }})"
                                title="Elimina">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Paginazione Livewire --}}
        <div class="mt-3">
            {{ $utenti->links() }}
        </div>
    </div>
</div>