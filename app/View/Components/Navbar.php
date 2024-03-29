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

        $items = [];

        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                $items = [
                    route('reservation.create') => 'Prenotazioni',
                    route('admin.clients') => 'Aggiungi Cliente',
                    route('clients.search') => 'Cerca Cliente',
                    route('admin.users') => 'Aggiungi Utente',
                ];
            } elseif (Auth::user()->is_manager) {
                $items = [
                    route('reservation.create') => 'Prenotazioni',
                    route('admin.clients') => 'Aggiungi Cliente',
                    route('clients.search') => 'Cerca Cliente',
                ];
            }
        }

        // Se non c'è un utente autenticato o se l'utente non è né admin né manager
        if (empty($items)) {
            $items = [
                route('homepage') => 'Homepage',
            ];
        }

        $this->items = $items;
        return view('components.navbar');
    }
}
