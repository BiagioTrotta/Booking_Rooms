<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $items;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        if (Auth::check() && Auth::user()->is_admin) {
            $this->items = [
                route('reservation.create') => 'Prenotazioni',
                route('admin.clients') => 'Aggiungi Cliente',
                route('clients.search') => 'Cerca Cliente',
                route('admin.users') => 'Aggiungi Utente',
            ];
        } else {
            $this->items = [
                route('homepage') => 'Homepage',
            ];
        }
        return view('components.navbar');
    }
}
