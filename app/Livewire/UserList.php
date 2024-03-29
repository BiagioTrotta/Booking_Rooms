<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    public $users;

    protected $listeners = [
        'loadUsers'
    ];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function editUser($user_id)
    {
        $this->dispatch('edit', $user_id);
    }


    public function deleteUser($user_id)
    {
        $user = User::find($user_id);

        if ($user->is_admin) {
            // Verifica se l'utente è un amministratore
            $adminCount = User::where('is_admin', true)->count();

            if ($adminCount > 1) {
                // Rimuovi l'utente solo se ci sono più di un amministratore nel sistema
                $user->delete();
                session()->flash('success', 'Utente eliminato con successo');
            } else {
                // Altrimenti, restituisci un errore o un avviso che indica che l'ultimo amministratore non può essere rimosso
                session()->flash('error', 'Non puoi eliminare l\'unico amministratore presente');
            }
        } else {
            // Se l'utente non è un amministratore, puoi eliminarlo direttamente
            $user->delete();
            session()->flash('success', 'Utente eliminato con successo');
        }

        $this->loadUsers();
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list', [
            'utenti' => User::orderBy('id')->paginate(8),
        ]);
    }
}
