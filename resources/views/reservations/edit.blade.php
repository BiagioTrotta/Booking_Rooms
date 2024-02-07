<x-main>
    <x-slot:title>Edit Reservation</x-slot:title>
    <div class="container">
        <h1>Modifica Prenotazione</h1>
        <a href="{{ route('reservation.create') }}" class="btn btn-dark my-3"><i class="fa-solid fa-arrow-rotate-left"></i> Back</a>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
        </div>
        @endif

        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="client_id">Cliente</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $reservation->client_id ? 'selected' : '' }}>
                        {{ $client->lastname }} {{ $client->firstname }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="room_id">Camera</label>
                <select name="room_id" id="room_id" class="form-control">
                    @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $reservation->room_id ? 'selected' : '' }}>
                        {{ $room->room_number }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="beds">Numero Letti</label>
                <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', $reservation->beds) }}" min="1" max="5">
            </div>

            <div class="form-group">
                <label for="check_in">Check-in</label>
                <input type="date" name="check_in" id="check_in" class="form-control" value="{{ $reservation->check_in }}">
            </div>

            <div class="form-group">
                <label for="check_out">Check-out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" value="{{ $reservation->check_out }}">
            </div>

            <div class="form-group">
                <label for="price">Price per night</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $reservation->price }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>
        </form>
    </div>
</x-main>