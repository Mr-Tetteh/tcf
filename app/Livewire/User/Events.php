<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Events extends Component
{
    #[Layout('layout.user.partials.website-base-user')]
    public function render()
    {
//        $events = Events
        return view('livewire.user.events');
    }
}
