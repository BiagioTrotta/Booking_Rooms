<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class="container">
        <a href="{{ route('admin.clients') }}" class="btn btn-dark my-3"><i class="fa-solid fa-arrow-rotate-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title m-0">Client Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> {{ $client->id }}</p>
                                <p><strong>Last Name:</strong> {{ $client->lastname }}</p>
                                <p><strong>First Name:</strong> {{ $client->firstname }}</p>
                                <p><strong>Phone:</strong> {{ $client->phone }}</p>
                                <p><strong>Email:</strong> {{ $client->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date of Birth:</strong> {{ $client->date_of_birth }}</p>
                                <p><strong>Place of Birth:</strong> {{ $client->place_of_birth }}</p>
                                <p><strong>Gender:</strong> {{ $client->gender }}</p>
                                <p><strong>Identity Document:</strong> {{ $client->identity_document }}</p>
                                <p><strong>Document Number:</strong> {{ $client->document_number }}</p>
                                <p><strong>Document Issuing Place:</strong> {{ $client->document_issuing_place }}</p>
                            </div>
                        </div>
                        <p class="mt-3"><strong>Created At:</strong> {{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</p>
                        @if ($client->reservations->count() > 0)
                        <h4>Prenotazioni:</h4>
                        <ul>
                            @foreach ($client->reservations as $reservation)
                            <li>
                                <b>Data di Check-in:</b> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_in)->format('d/m/Y') }} - <b>Data di Check-out:</b> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->check_out)->format('d/m/Y') }}

                                <b>Prezzo a Notte:</b> {{ $reservation->price}}
                                <b>Prezzo Totale:</b> {{ $reservation->price_tot }}
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>Il cliente non ha prenotazioni.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>