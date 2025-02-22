<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminUsers extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $first_name;
    public $last_name;
    public $email;
    public $contact;
    public $role;
    public $user_id;
    public $isEdit = false;
    public $modal = false;


    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function executeFunctions($id)
    {
        $this->edit($id);
        $this->toggleModal();
    }
    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->contact = '';
        $this->role = '';
        $this->user_id = '';

    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'contact' => 'required',
        'role' => 'required',

    ];

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->contact = $user->contact;
        $this->role = $user->role;
        $this->isEdit = true;


    }

    public function delete($id)
    {
        User::destroy($id);


    }

    public function update()
    {
        $this->validate();
        $users = User::findOrFail($this->user_id);
        $users->update([
            'role' => $this->role,
        ]);

        $this->resetForm();
        $this->modal=false;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.admin-users', compact('users'));
    }
}
