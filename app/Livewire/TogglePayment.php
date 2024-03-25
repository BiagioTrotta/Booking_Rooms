<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class TogglePayment extends Component
{
    public $reservation;

    public function mount($reservationId)
    {
        $this->reservation = Reservation::find($reservationId);
    }

    public function togglePaymentStatus()
    {
        if ($this->reservation) {
            // Cambia lo stato del pagamento
            $this->reservation->paid = !$this->reservation->paid;
            $this->reservation->save();
        }
    }

    public function render()
    {
        return view('livewire.toggle-payment');
    }
}
