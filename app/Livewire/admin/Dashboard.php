<?php

namespace App\Livewire\admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layout.Admin.partials.website-base-admin')]
    public function render()
    {
        $users = User::all()->count();
        $members = \App\Models\RegisterMember::all()->count();
        $males = \App\Models\RegisterMember::where('gender', 'male')->count();
        $females = \App\Models\RegisterMember::where('gender', 'female')->count();
        $youth = \App\Models\RegisterMember::where('age_category', 'youth')->count();
        $children = \App\Models\RegisterMember::where('age_category', 'child')->count();


        return view('livewire.admin.dashboard', compact('users', 'members', 'males', 'females', 'youth', 'children'));
    }
}
