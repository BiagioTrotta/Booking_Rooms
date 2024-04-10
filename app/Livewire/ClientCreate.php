<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientCreate extends Component
{
    // Data Client
    public $lastname;
    public $firstname;
    public $email;
    public $phone;
    public $client;
    //Others
    public $date_of_birth;
    public $place_of_birth;
    public $gender;
    public $identity_document;
    public $document_number;
    public $document_issuing_place;
    //Group_1
    public $lastname_group_1;
    public $firstname_group_1;
    public $date_of_birth_group_1;
    public $place_of_birth_group_1;
    public $gender_group_1;
    public $identity_document_group_1;
    public $document_number_group_1;
    public $document_issuing_place_group_1;
    // Group_2
    public $lastname_group_2;
    public $firstname_group_2;
    public $date_of_birth_group_2;
    public $place_of_birth_group_2;
    public $gender_group_2;
    public $identity_document_group_2;
    public $document_number_group_2;
    public $document_issuing_place_group_2;

    // Regole di validazione
    protected $rules = [
        'lastname' => 'required|min:2|max:10',
        'firstname' => 'nullable|max:10',
        'phone' => 'nullable|max:20',
        'email' => 'nullable|email',
        // Others
        'date_of_birth' => 'nullable|date',
        'place_of_birth' => 'nullable|max:255',
        'gender' => 'nullable|in:male,female,other',
        'identity_document' => 'nullable|max:255',
        'document_number' => 'nullable|max:255',
        'document_issuing_place' => 'nullable|max:255',
        // Group_1
        'lastname_group_1' => 'nullable|max:10',
        'firstname_group_1' => 'nullable|max:10',
        'date_of_birth_group_1' => 'nullable|date',
        'place_of_birth_group_1' => 'nullable|max:255',
        'gender_group_1' => 'nullable|in:male,female,other',
        'identity_document_group_1' => 'nullable|max:255',
        'document_number_group_1' => 'nullable|max:255',
        'document_issuing_place_group_1' => 'nullable|max:255',
        // Group_2
        'lastname_group_2' => 'nullable|max:10',
        'firstname_group_2' => 'nullable|max:10',
        'date_of_birth_group_2' => 'nullable|date',
        'place_of_birth_group_2' => 'nullable|max:255',
        'gender_group_2' => 'nullable|in:male,female,other',
        'identity_document_group_2' => 'nullable|max:255',
        'document_number_group_2' => 'nullable|max:255',
        'document_issuing_place_group_2' => 'nullable|max:255',
    ];

    protected $listeners = [
        'edit' => 'editClientById',
        'newClient',
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
                // Group_1
                'lastname_group_1' => $this->lastname_group_1,
                'firstname_group_1' => $this->firstname_group_1,
                'date_of_birth_group_1' => $this->date_of_birth_group_1,
                'place_of_birth_group_1' => $this->place_of_birth_group_1,
                'gender_group_1' => $this->gender_group_1,
                'identity_document_group_1' => $this->identity_document_group_1,
                'document_number_group_1' => $this->document_number_group_1,
                'document_issuing_place_group_1' => $this->document_issuing_place_group_1,
                // Group_2
                'lastname_group_2' => $this->lastname_group_2,
                'firstname_group_2' => $this->firstname_group_2,
                'date_of_birth_group_2' => $this->date_of_birth_group_2,
                'place_of_birth_group_2' => $this->place_of_birth_group_2,
                'gender_group_2' => $this->gender_group_2,
                'identity_document_group_2' => $this->identity_document_group_2,
                'document_number_group_2' => $this->document_number_group_2,
                'document_issuing_place_group_2' => $this->document_issuing_place_group_2,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Cliente modificato con successo.');
        } else {
            // Verifica e formatta la data di nascita del gruppo 1
            $date_of_birth_group_1 = !empty($this->date_of_birth_group_1) ? date('Y-m-d', strtotime($this->date_of_birth_group_1)) : null;

            // Verifica e formatta la data di nascita del gruppo 2
            $date_of_birth_group_2 = !empty($this->date_of_birth_group_2) ? date('Y-m-d', strtotime($this->date_of_birth_group_2)) : null;

            // Creazione di un nuovo cliente
            Client::create([
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'email' => $this->email,
                'phone' => $this->phone,
                //Others
                'date_of_birth' => $this->date_of_birth ? date('Y-m-d', strtotime($this->date_of_birth)) : null,
                'place_of_birth' => $this->place_of_birth,
                'gender' => $this->gender ? $this->gender : null,
                'identity_document' => $this->identity_document,
                'document_number' => $this->document_number,
                'document_issuing_place' => $this->document_issuing_place,
                // Group_1
                'lastname_group_1' => $this->lastname_group_1,
                'firstname_group_1' => $this->firstname_group_1,
                'date_of_birth_group_1' => $date_of_birth_group_1 ? date('Y-m-d', strtotime($date_of_birth_group_1)) : null,
                'place_of_birth_group_1' => $this->place_of_birth_group_1,
                'gender_group_1' => $this->gender_group_1 ? $this->gender_group_1 : null,
                'identity_document_group_1' => $this->identity_document_group_1,
                'document_number_group_1' => $this->document_number_group_1,
                'document_issuing_place_group_1' => $this->document_issuing_place_group_1,
                // Group_2
                'lastname_group_2' => $this->lastname_group_2,
                'firstname_group_2' => $this->firstname_group_2,
                'date_of_birth_group_2' => $date_of_birth_group_2 ? date('Y-m-d', strtotime($date_of_birth_group_2)) : null,
                'place_of_birth_group_2' => $this->place_of_birth_group_2,
                'gender_group_2' => $this->gender_group_2 ? $this->gender_group_2 : null,
                'identity_document_group_2' => $this->identity_document_group_2,
                'document_number_group_2' => $this->document_number_group_2,
                'document_issuing_place_group_2' => $this->document_issuing_place_group_2,
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
        $this->date_of_birth = '';
        $this->place_of_birth = '';
        $this->gender = '';
        $this->identity_document = '';
        $this->document_number = '';
        $this->document_issuing_place = '';
        // Group_1
        $this->lastname_group_1 = '';
        $this->firstname_group_1 = '';
        $this->date_of_birth_group_1 = '';
        $this->place_of_birth_group_1 = '';
        $this->gender_group_1 = '';
        $this->identity_document_group_1 = '';
        $this->document_number_group_1 = '';
        $this->document_issuing_place_group_1 = '';
        // Group_2
        $this->lastname_group_2 = '';
        $this->firstname_group_2 = '';
        $this->date_of_birth_group_2 = '';
        $this->place_of_birth_group_2 = '';
        $this->gender_group_2 = '';
        $this->identity_document_group_2 = '';
        $this->document_number_group_2 = '';
        $this->document_issuing_place_group_2 = '';
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
        // Group_1
        $this->lastname_group_1 = $this->client->lastname_group_1;
        $this->firstname_group_1 = $this->client->firstname_group_1;
        $this->date_of_birth_group_1 = $this->client->date_of_birth_group_1;
        $this->place_of_birth_group_1 = $this->client->place_of_birth_group_1;
        $this->gender_group_1 = $this->client->gender_group_1;
        $this->identity_document_group_1 = $this->client->identity_document_group_1;
        $this->document_number_group_1 = $this->client->document_number_group_1;
        $this->document_issuing_place_group_1 = $this->client->document_issuing_place_group_1;
        // Group_2
        $this->lastname_group_2 = $this->client->lastname_group_2;
        $this->firstname_group_2 = $this->client->firstname_group_2;
        $this->date_of_birth_group_2 = $this->client->date_of_birth_group_2;
        $this->place_of_birth_group_2 = $this->client->place_of_birth_group_2;
        $this->gender_group_2 = $this->client->gender_group_2;
        $this->identity_document_group_2 = $this->client->identity_document_group_2;
        $this->document_number_group_2 = $this->client->document_number_group_2;
        $this->document_issuing_place_group_2 = $this->client->document_issuing_place_group_2;
    }
    public function render()
    {
        return view('livewire.client-create');
    }
}
