<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function show($id)
    {
        $title = 'Client Details';
        $client = Client::findOrFail($id);

        return view('clients.show', compact('title','client'));
    }

    public function search(Request $request)
    {
        $title = 'Client Search';
        $search = $request->input('search');
        $clients = Client::where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->paginate(7);
        return view('clients.search', compact('title', 'clients'));
    }
}
