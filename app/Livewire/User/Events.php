<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Events extends Component
{
    #[Layout('layout.user.partials.website-base-user')]
    public function render()
    {
       $datas = \App\Models\Events::latest()->get();
        return view('livewire.user.events', compact('datas'));
    }
}
