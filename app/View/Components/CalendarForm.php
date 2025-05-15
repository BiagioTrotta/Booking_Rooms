<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CalendarForm extends Component
{
    public $startOfMonth;

    public function __construct($startOfMonth)
    {
        $this->startOfMonth = $startOfMonth;
    }

    public function render(): View
    {
        return view('components.calendar-form');
    }
}
