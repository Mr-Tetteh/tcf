<?php

namespace App\Livewire\User;

use App\Models\Sermon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Sermons extends Component
{
    #[Layout('layout.user.partials.website-base-user')]
    public function render()
    {
        $datas =  Sermon::latest()->paginate(3);
        return view('livewire.user.sermons',compact('datas'));
    }
}
