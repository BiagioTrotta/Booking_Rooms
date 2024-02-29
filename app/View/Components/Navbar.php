<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
        $this->items =
            [
                route('reservation.create') => 'Prenotazioni',
                route('admin.clients') => 'Aggiungi Cliente',
                route('clients.search') => 'Cerca Cliente',

            ];
        return view('components.navbar');
    }
}
