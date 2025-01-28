<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminUsers extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public function render()
    {
        $users =  User::all();
        return view('livewire.admin.admin-users', compact('users'));
    }
}
