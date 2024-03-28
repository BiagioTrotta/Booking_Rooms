<div class="container bg-light p-4 rounded">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row g-3">
        <div class="col-12">
            <h3 class="fa">Form utente</h3>
            <hr>
            <button class="btn btn-sm btn-dark fa" wire:click="resetFields">Resetta</button>
        </div>
        <form wire:submit.prevent="store">
            <div class="col-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" wire:model="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" wire:model="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mt-2">
                <label for="isAdmin">Admin</label>
                <input type="checkbox" class="form-check-input" wire:model="isAdmin" @if($isAdmin) checked @endif>
                @error('isAdmin')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark mt-3"><i class="fa-solid fa-plus"> Salva</i></button>
            </div>
        </form>
    </div>
</div>