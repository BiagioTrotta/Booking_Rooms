<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fa">Lista Utenti <i class="fa-solid fa-users"></i></h2>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
    </div>
    <div class="table-responsive rounded">
        <table class="table table-striped">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Admin</th>
                <th class="text-center">Manager</th>
                <th></th>
            </thead>
            <tbody>
                @foreach( $utenti as $user )
                <tr class="table-light">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @if($user->is_admin)
                        <i class="fa-solid fa-check text-success"></i>
                        @else
                        <i class="fa-solid fa-xmark"></i>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($user->is_manager)
                        <i class="fa-solid fa-check text-success"></i>
                        @else
                        <i class="fa-solid fa-xmark"></i>
                        @endif
                    </td>
                    <td class="d-flex justify-content-around">
                        <button class="btn btn-sm btn-dark fa" wire:click="editUser({{ $user->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger fa" wire:click="deleteUser({{$user->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $utenti->links() }}
    </div>
</div>