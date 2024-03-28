<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container">
        <a href="{{ route('admin.clients') }}" class="btn btn-dark my-3"><i class="fa-solid fa-arrow-rotate-left"></i> Torna Indietro</a>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card my-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title m-0">Dettagli Cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ Storage::url('public/media/placeholder.png') }}" alt="" class="rounded-circle mx-auto my-3">
                                <h6 class="card-subtitle mb-2 text-body-secondary"><strong>ID # </strong>{{ $client->id }}</h6>
                                <h4 class="mb-3">{{ $client->lastname }} {{ $client->firstname }}</h4>
                                <p><strong>Telefono:</strong> {{ $client->phone }}</p>
                                <p><strong>Email:</strong> {{ $client->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Data di Nascita:</strong>
                                    @if ($client->date_of_birth)
                                    {{ \Carbon\Carbon::parse($client->date_of_birth)->format('d/m/Y') }}
                                    @else

                                    @endif
                                </p>
                                <p><strong>Luogo di Nascita:</strong> {{ $client->place_of_birth }}</p>
                                <p><strong>Sesso:</strong> {{ $client->gender }}</p>
                                <p><strong>Documento d'Identità:</strong> {{ $client->identity_document }}</p>
                                <p><strong>Numero Documento:</strong> {{ $client->document_number }}</p>
                                <p><strong>Luogo di Rilascio Documento:</strong> {{ $client->document_issuing_place }}</p>
                            </div>
                        </div>
                        <p class="mt-3"><strong>Creato il:</strong> {{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</p>

                    </div>
                </div>
            </div>
            @if($client->lastname_group_1 != null)
            <div class="col-md-9 mx-auto">
                <div class="card my-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title m-0">Gruppo</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gruppo 1</th>
                                        <th>Gruppo 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Cognome:</strong> {{ $client->lastname_group_1 }}<br>
                                            <strong>Nome:</strong> {{ $client->firstname_group_1 }}<br>
                                            <strong>Data di nascita:</strong>
                                            @if ($client->date_of_birth_group_1)
                                            {{ \Carbon\Carbon::parse($client->date_of_birth_group_1)->format('d/m/Y') }}
                                            @else

                                            @endif
                                            <br>
                                            <strong>Luogo di nascita:</strong> {{ $client->place_of_birth_group_1 }}<br>
                                            <strong>Sesso:</strong> {{ $client->gender_group_1 }}<br>
                                            <strong>Documento d'identità:</strong> {{ $client->identity_document_group_1 }}<br>
                                            <strong>Numero documento:</strong> {{ $client->document_number_group_1 }}<br>
                                            <strong>Luogo di rilascio:</strong> {{ $client->document_issuing_place_group_1 }}
                                        </td>
                                        <td>
                                            <strong>Cognome:</strong> {{ $client->lastname_group_2 }}<br>
                                            <strong>Nome:</strong> {{ $client->firstname_group_2 }}<br>
                                            <strong>Data di nascita:</strong>
                                            @if ($client->date_of_birth_group_2)
                                            {{ \Carbon\Carbon::parse($client->date_of_birth_group_2)->format('d/m/Y') }}
                                            @else

                                            @endif
                                            <br>
                                            <strong>Luogo di nascita:</strong> {{ $client->place_of_birth_group_2 }}<br>
                                            <strong>Sesso:</strong> {{ $client->gender_group_2 }}<br>
                                            <strong>Documento d'identità:</strong> {{ $client->identity_document_group_2 }}<br>
                                            <strong>Numero documento:</strong> {{ $client->document_number_group_2 }}<br>
                                            <strong>Luogo di rilascio:</strong> {{ $client->document_issuing_place_group_2 }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-9 mx-auto">
                @if ($client->reservations->count() > 0)
                <p class="d-inline-flex gap-1">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Lista Prenotazioni
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card mb-5">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title m-0">Prenotazioni:</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data di Check-in</th>
                                            <th>Data di Check-out</th>
                                            <th>Camera</th>
                                            <th>Prezzo a Notte</th>
                                            <th>Prezzo Totale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client->reservations as $reservation)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_in)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_out)->format('d/m/Y') }}</td>
                                            <td>{{ $reservation->room->room_number }}</td>
                                            <td>{{ $reservation->price }} €</td>
                                            <td>{{ $reservation->price_tot }} €</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="bg-primary text-white rounded p-2">Il cliente non ha prenotazioni.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>