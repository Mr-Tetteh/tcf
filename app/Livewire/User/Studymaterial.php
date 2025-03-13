<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Studymaterial extends Component
{
    #[Layout('layout.user.partials.website-base-user')]

    public function render()
    {
        $datas = \App\Models\StudyMaterial::latest()->paginate(6);
        return view('livewire.user.studymaterial', compact('datas'));
    }
}
