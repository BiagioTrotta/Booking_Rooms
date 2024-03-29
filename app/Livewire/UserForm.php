<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class UserForm extends Component
{
    // Definizione delle proprietà pubbliche per i dati del modulo
    public $isAdmin;
    public $isManager;
    public $name;
    public $email;
    public $password;
    public $user;

    // Definizione degli eventi ascoltati e dei rispettivi metodi di gestione
    protected $listeners = [
        'edit' => 'editUserById',
        'resetFields',
    ];


    public function editUserById($user_id)
    {
        $this->edit($user_id);
    }


    protected $rules = [
        'name' => 'required|max:15',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
        'isAdmin' => 'nullable|boolean',
        'isManager' => 'nullable|boolean',
    ];

    // Metodo richiamato quando si aggiorna una proprietà del componente
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Metodo per gestire il salvataggio o l'aggiornamento degli utenti
    public function store()
    {
        $this->validate();

        // Verifica se l'email è già presente nel database
        $existingUser = User::where('email', $this->email)->first();

        // Se esiste già un utente con la stessa email, aggiorna i dati di quell'utente invece di creare un nuovo utente
        if ($existingUser) {
            $existingUser->name = $this->name;
            // Verifica se ci sono più di un amministratore nel sistema
            $adminCount = User::where('is_admin', true)->count();

            if ($adminCount <= 1 && $this->user->is_admin && $this->isAdmin != true) {
                // Se questo è l'unico amministratore presente nel sistema, disabilita la modifica del campo isAdmin
                $this->isAdmin = true;
                session()->flash('error', 'L\'ultimo amministratore presente nel sistema non può essere disabilitato');
            }

            $existingUser->is_admin = $this->isAdmin;

            if ($this->isAdmin) {
                // Se l'utente è un amministratore, impostalo anche come manager
                $this->isManager = true;
            }

            if ($this->isManager) {
                // Se l'utente è un amministratore, impostalo anche come manager
                $this->isAdmin = false;
            }


            $existingUser->is_manager = $this->isManager;
            if ($this->password) {
                $existingUser->password = bcrypt($this->password);
            }
            $existingUser->save();

            session()->flash('success', 'Utente aggiornato con successo');
        } else {
            // Altrimenti, crea un nuovo utente
            $user = new User;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = bcrypt($this->password);
            $user->is_admin = $this->isAdmin ? true : ($this->isAdmin === '' ? false : $this->isAdmin);
            $user->is_manager = $this->isManager ? true : ($this->isManager === '' ? false : $this->isManager);
            if($this->isAdmin){
                $user->is_manager = true;
            }

            if ($this->isManager) {
                // Se l'utente è un amministratore, impostalo anche come manager
                $user->is_admin = false;
            }

            $user->save();

            session()->flash('success', 'User successfully saved');
        }

        $this->resetFields();

        $this->dispatch('loadUsers')->to('user-list');
    }

    // Metodo per inizializzare il componente
    public function mount()
    {
        $this->resetFields();
    }

    // Metodo per reimpostare i campi del modulo
    public function resetFields()
    {
        $this->user = new User;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->isAdmin = '';
        $this->isManager= '';
    }

    // Metodo per caricare i dati dell'utente da modificare
    public function edit($user_id)
    {
        $this->user = User::findOrFail($user_id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->isAdmin = $this->user->is_admin;
        $this->isManager = $this->user->is_manager;
    }

    // Metodo per renderizzare la vista del componente
    public function render()
    {
        return view('livewire.user-form');
    }
}
