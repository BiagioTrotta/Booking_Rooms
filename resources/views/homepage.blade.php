<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row text-center">
            <h1 class="mt-2 display-3 text-primary"><i class="fa-solid fa-desktop"> {{ config('app.name') }}</i></h1>
        </div>
    </div>
    <div class="container-fluid my-3">
        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/id/16/1200/400" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="display-5">Benvenuti nel Portale Interno</h5>
                            <p>Accedi alle risorse aziendali in modo rapido e intuitivo.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/384/1200/400" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="display-5">Risorse Interne a Portata di Click!</h5>
                            <p>Trova facilmente documenti, moduli e prenotazioni.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/575/1200/400" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="display-5">Feedback e Partecipazione</h5>
                            <p>La tua opinione conta! Fornisci feedback e partecipa ai nostri sondaggi per aiutarci a migliorare.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</x-main>