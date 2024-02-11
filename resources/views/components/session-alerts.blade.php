<div>
    {{-- Visualizza un messaggio di successo se presente --}}
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Visualizza un messaggio di errore se presente --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</div>