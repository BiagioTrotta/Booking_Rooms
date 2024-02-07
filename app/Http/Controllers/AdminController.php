<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function clients()
    {
        $title = 'Add Clients';
        return view('admin.clients', compact('title'));
    }
}
