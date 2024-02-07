<x-main>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>
    <div class="container">
        <h2>{{ $title }}</h2>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="mb-3">
            <form action="{{ route('clients.search') }}" method="GET" class="row">
                <div class="form-group col-10">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-primary col-2">Search</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->lastname }}</a></td>
                        <td>{{ $client->firstname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-magnifying-glass fa-sm"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $clients->links() }}
    </div>
</x-main>