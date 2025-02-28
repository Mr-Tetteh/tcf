<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.user.partials.website-base-user')]
class Gallery extends Component
{
    public function render()
    {
        $gallerys = \App\Models\Gallery::all();
        return view('livewire.user.gallery', compact('gallerys'));
    }
}
