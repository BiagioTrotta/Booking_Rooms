<div class="container bg-light p-4 rounded shadow-sm">
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

    <div class="row mb-3">
        <div class="col">
            <h3 class="fa mb-3">Gestione Utente</h3>
            <button class="btn btn-outline-secondary btn-sm" wire:click="resetFields">
                <i class="fa-solid fa-rotate-left me-1"></i> Resetta
            </button>
        </div>
    </div>

    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" class="form-control" wire:model.defer="name">
            @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" wire:model.defer="email">
            @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" wire:model.defer="password">
            @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label d-block mb-1">Ruoli</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="isAdmin" wire:model="isAdmin">
                <label class="form-check-label" for="isAdmin">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="isManager" wire:model="isManager">
                <label class="form-check-label" for="isManager">Manager</label>
            </div>
            @error('isAdmin')<div class="text-danger small">{{ $message }}</div>@enderror
            @error('isManager')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i> Salva
            </button>
        </div>
    </form>
</div>