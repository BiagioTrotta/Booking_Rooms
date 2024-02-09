<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientList extends Component
{
    public $clients;
    public $confirmingClientId = null;

    protected $listeners = [
        'loadClients'
    ];

    public function mount()
    {
        $this->loadClients();
    }

    public function loadClients()
    {
        $this->clients = Client::all();
    }

    public function editClient($client_id)
    {
        $this->dispatch('edit', $client_id);
    }

    public function confirmClientDeletion($client_id)
    {
        $this->confirmingClientId = $client_id;
    }

    public function deleteClient($client_id)
    {
        $client = Client::find($client_id);

        $client->reservations()->delete();
        $client->delete();

        session()->flash('success', 'User successfully deleted');
        $this->loadClients();

        // Resetta la variabile di stato per nascondere il messaggio di conferma
        $this->confirmingClientId = null;
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.client-list', [
            'clienti' => Client::orderBy('lastname')->orderBy('firstname')->paginate(7),
        ]);
    }

}
