<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Events extends Component
{
    #[Layout('layout.user.partials.website-base-user')]
    public function render()
    {
        $events = \App\Models\Events::latest()->paginate(10);
        return view('livewire.user.events', compact('events'));
    }
}
