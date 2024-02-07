<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientCreate extends Component
{
    // Proprietà del componente
    public $lastname;
    public $firstname;
    public $email;
    public $phone;
    public $client;
    //Others
    public $date_of_birth; // Aggiungi i nuovi campi
    public $place_of_birth;
    public $gender;
    public $identity_document;
    public $document_number;
    public $document_issuing_place;

    // Regole di validazione
    protected $rules = [
        'lastname' => 'required|min:2|max:10',
        'firstname' => 'required|min:2|max:10',
        'phone' => 'nullable|max:20',
        'email' => 'nullable|email',
        // Others
        'date_of_birth' => 'nullable|date',
        'place_of_birth' => 'nullable|max:255',
        'gender' => 'nullable|in:male,female,other',
        'identity_document' => 'nullable|max:255',
        'document_number' => 'nullable|max:255',
        'document_issuing_place' => 'nullable|max:255',
    ];

    protected $listeners = [
        'edit' => 'editClientById'
    ];

    public function editClientById($client_id)
    {
        $this->edit($client_id);
    }

    public function createClient()
    {
        // Validazione dei dati
        $this->validate();

        // Controlla se stai creando un nuovo cliente o modificando un cliente esistente
        if ($this->client) {
            // Modifica il cliente esistente
            $this->client->update([
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'email' => $this->email,
                'phone' => $this->phone,
                //Others
                'date_of_birth' => $this->date_of_birth,
                'place_of_birth' => $this->place_of_birth,
                'gender' => $this->gender,
                'identity_document' => $this->identity_document,
                'document_number' => $this->document_number,
                'document_issuing_place' => $this->document_issuing_place,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Cliente modificato con successo.');
        } else {
            // Creazione di un nuovo cliente
            Client::create([
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'email' => $this->email,
                'phone' => $this->phone,
                //Others
                'date_of_birth' => $this->date_of_birth,
                'place_of_birth' => $this->place_of_birth,
                'gender' => $this->gender,
                'identity_document' => $this->identity_document,
                'document_number' => $this->document_number,
                'document_issuing_place' => $this->document_issuing_place,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Cliente creato con successo.');
        }

        // Pulisci i campi del modulo dopo la creazione o la modifica
        $this->newClient();

        // Aggiorna la lista dei clienti emettendo un evento
        $this->dispatch('loadClients');
    }

    // Metodo per resettare i campi del form
    public function newClient()
    {
        $this->client = null; // Se è un oggetto, dovrebbe essere null
        $this->lastname = '';
        $this->firstname = '';
        $this->email = '';
        $this->phone = '';
    }

    // Metodo per caricare i dati di un cliente per la modifica
    public function edit($client_id)
    {
        $this->client = Client::find($client_id);
        $this->lastname = $this->client->lastname;
        $this->firstname = $this->client->firstname;
        $this->email = $this->client->email;
        $this->phone = $this->client->phone;
        // Others
        $this->date_of_birth = $this->client->date_of_birth;
        $this->place_of_birth = $this->client->place_of_birth;
        $this->gender = $this->client->gender;
        $this->identity_document = $this->client->identity_document;
        $this->document_number = $this->client->document_number;
        $this->document_issuing_place = $this->client->document_issuing_place;
    }
    public function render()
    {
        return view('livewire.client-create');
    }
}
