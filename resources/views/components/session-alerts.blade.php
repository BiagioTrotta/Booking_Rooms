<div>
    {{-- Visualizza un messaggio di successo se presente --}}
    @if (session()->has('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
    @endif

    {{-- Visualizza un messaggio di errore se presente --}}
    @if (session()->has('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
    @endif
</div>