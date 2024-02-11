<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container">
        <a href="{{ route('admin.clients') }}" class="btn btn-dark my-3"><i class="fa-solid fa-arrow-rotate-left"></i> Torna Indietro</a>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title m-0">Dettagli Cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> {{ $client->id }}</p>
                                <p><strong>Cognome:</strong> {{ $client->lastname }}</p>
                                <p><strong>Nome:</strong> {{ $client->firstname }}</p>
                                <p><strong>Telefono:</strong> {{ $client->phone }}</p>
                                <p><strong>Email:</strong> {{ $client->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Data di Nascita:</strong> {{ $client->date_of_birth }}</p>
                                <p><strong>Luogo di Nascita:</strong> {{ $client->place_of_birth }}</p>
                                <p><strong>Sesso:</strong> {{ $client->gender }}</p>
                                <p><strong>Documento d'Identità:</strong> {{ $client->identity_document }}</p>
                                <p><strong>Numero Documento:</strong> {{ $client->document_number }}</p>
                                <p><strong>Luogo di Rilascio Documento:</strong> {{ $client->document_issuing_place }}</p>
                            </div>
                        </div>
                        <p class="mt-3"><strong>Creato il:</strong> {{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</p>
                        @if ($client->reservations->count() > 0)
                        <h4>Prenotazioni:</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Data di Check-in</th>
                                        <th>Data di Check-out</th>
                                        <th>Prezzo a Notte</th>
                                        <th>Prezzo Totale</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client->reservations as $reservation)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_in)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_out)->format('d/m/Y') }}</td>
                                        <td>{{ $reservation->price }} €</td>
                                        <td>{{ $reservation->price_tot }} €</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p>Il cliente non ha prenotazioni.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>