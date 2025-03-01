<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Events extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $event_name;
    public $event_date;
    public $event_time;
    public $event_host;
    public $event_speaker;

    public function render()
    {
        return view('livewire.admin.events');
    }
}
