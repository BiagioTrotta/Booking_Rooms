 <div class="container my-5">
     <form class="row bg-white shadow rounded" action="{{ route('reservation.store') }}" method="POST">
         <h1 class="bg-dark text-white rounded">Nuova Prenotazione</h1>
         @csrf
         <div class="form-group col-4">
             <label for="client_id" class="fw-bold">Cliente</label>
             <select name="client_id" id="client_id" class="form-control">
                 <option value="">Seleziona Cliente</option>
                 @foreach ($clients as $client)
                 <option value="{{ $client->id }}">{{ $client->lastname }} {{ $client->firstname }}</option>
                 @endforeach
             </select>
         </div>
         <div class="form-group col-4">
             <label for="room_id" class="fw-bold">Camera</label>
             <select name="room_id" id="room_id" class="form-control">
                 <option value="">Seleziona Camera</option>
                 @foreach ($rooms as $room)
                 <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                 @endforeach
             </select>
         </div>
         <div class="form-group col-4">
             <label for="beds" class="fw-bold">Posti letto</label>
             <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', '1') }}" min="1" max="5">
         </div>
         <div class="form-group col-4">
             <label for="check_in" class="fw-bold">Check-in</label>
             <input type="date" name="check_in" id="check_in" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
         </div>
         <div class="form-group col-4">
             <label for="check_out" class="fw-bold">Check-out</label>
             <input type="date" name="check_out" id="check_out" class="form-control" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
         </div>
         <div class="form-group col-4">
             <label for="price" class="fw-bold">Prezzo notte</label>
             <input type="number" step="0.00" name="price" id="price" class="form-control" value="{{ old('price', '0.00') }}" min="0">
         </div>
         <div class="col-12 d-flex align-items-center justify-content-center">
             <button type="submit" class="btn btn-primary my-3 w-25">Prenota</button>
         </div>
     </form>
 </div>