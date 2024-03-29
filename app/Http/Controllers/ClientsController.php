<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function show($id)
    {
        $title = 'Dettagli Cliente';
        $client = Client::findOrFail($id);

        return view('clients.show', compact('title','client'));
    }

    public function search(Request $request)
    {
        $title = 'Cerca cliente';
        $search = $request->input('search');
        $clients = Client::where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->paginate(7);
        return view('clients.search', compact('title', 'clients'));
    }
}
