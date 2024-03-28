<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function clients()
    {
        $title = 'Aggiungi Cliente';
        return view('admin.clients', compact('title'));
    }

    public function users()
    {
        $title = 'Aggiungi Utente';
        return view('admin.users', compact('title'));
    }
}
