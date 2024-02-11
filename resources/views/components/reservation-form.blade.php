 <div class="container mb-5">
     <h1 class="bg-dark text-white">Nuova Prenotazione</h1>
     <form class="row" action="{{ route('reservation.store') }}" method="POST">
         @csrf
         <div class="form-group col-4">
             <label for="client_id">Cliente</label>
             <select name="client_id" id="client_id" class="form-control">
                 @foreach ($clients as $client)
                 <option value="{{ $client->id }}">{{ $client->lastname }} {{ $client->firstname }}</option>
                 @endforeach
             </select>
         </div>
         <div class="form-group col-4">
             <label for="room_id">Camera</label>
             <select name="room_id" id="room_id" class="form-control">
                 @foreach ($rooms as $room)
                 <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                 @endforeach
             </select>
         </div>
         <div class="form-group col-4">
             <label for="beds">Numero Letti</label>
             <input type="number" name="beds" id="beds" class="form-control" value="{{ old('beds', '1') }}" min="1" max="5">
         </div>
         <div class="form-group col-4">
             <label for="check_in">Check-in</label>
             <input type="date" name="check_in" id="check_in" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
         </div>
         <div class="form-group col-4">
             <label for="check_out">Check-out</label>
             <input type="date" name="check_out" id="check_out" class="form-control" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
         </div>
         <div class="form-group col-4">
             <label for="price">Prezzo a notte</label>
             <input type="number" step="0.00" name="price" id="price" class="form-control" value="{{ old('price', '0.00') }}" min="0">
         </div>
         <div class="col-12 d-flex align-items-center justify-content-center">
             <button type="submit" class="btn btn-primary mt-3 w-25">Prenota</button>
         </div>
     </form>
 </div>