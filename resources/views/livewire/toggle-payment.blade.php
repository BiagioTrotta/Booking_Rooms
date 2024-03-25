<div>
    <button class="btn btn-sm {{ $reservation->paid ? 'btn-success' : 'btn-warning' }}" wire:click="togglePaymentStatus">
        <i class="fa-solid {{ $reservation->paid ? 'fa-check' : 'fa-times' }}"></i>
    </button>
</div>