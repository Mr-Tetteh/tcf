<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Online extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        return view('livewire.admin.online');
    }
}
