<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-4 text-center">
        <h1 class="display-3 fw-bold text-gradient">
            <i class="fa-solid fa-rocket me-2"></i>{{ config('app.name') }}
        </h1>
        <p class="lead text-muted">Il tuo hub digitale. Veloce, smart, essenziale.</p>
    </div>

    <div class="container-fluid my-4">
        <div class="row">
            <div id="homepageCarousel" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/id/16/1200/400" class="d-block w-100" alt="Benvenuti">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                            <h5 class="display-6">🚀 Benvenuto a bordo!</h5>
                            <p>Esplora risorse aziendali, strumenti e servizi, tutto in un solo posto.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/384/1200/400" class="d-block w-100" alt="Risorse">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                            <h5 class="display-6">📂 Tutto a portata di click</h5>
                            <p>Documenti, moduli, prenotazioni... tutto organizzato per te.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/575/1200/400" class="d-block w-100" alt="Feedback">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                            <h5 class="display-6">💬 Partecipa e migliora</h5>
                            <p>Dì la tua nei sondaggi, lascia feedback e contribuisci all’evoluzione della piattaforma.</p>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Precedente</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Successivo</span>
                </button>
            </div>
        </div>
    </div>
</x-main>