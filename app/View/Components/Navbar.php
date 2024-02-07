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
                route('homepage') => 'Home',
                route('reservation.create') => 'Add Reservaztion',
                route('admin.clients') => 'Add Clients',
                route('clients.search') => 'Search Users',

            ];
        return view('components.navbar');
    }
}
