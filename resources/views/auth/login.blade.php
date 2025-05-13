<x-main>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 480px;">
            <div class="text-center mb-4">
                <i class="fa-solid fa-user-lock fa-3x text-primary mb-3"></i>
                <h1 class="h3 fw-bold">Accesso Area Riservata</h1>
                <p class="text-muted">Inserisci le tue credenziali per continuare</p>
            </div>

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="you@example.com" required>
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Entra
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-main>