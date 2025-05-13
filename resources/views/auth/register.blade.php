<x-main>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 540px;">
            <div class="text-center mb-4">
                <i class="fa-solid fa-user-plus fa-3x text-success mb-3"></i>
                <h1 class="h3 fw-bold">Crea un Nuovo Account</h1>
                <p class="text-muted">Compila i campi per registrarti al portale</p>
            </div>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Mario Rossi" required>
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="you@example.com" required>
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Minimo 8 caratteri" required>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Ripeti la password" required>
                    @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fa-solid fa-user-check me-2"></i> Registrati
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-main>