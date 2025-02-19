<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class FamilyGatheringAllYears extends Component
{
    #[Layout('layout.Admin.partials.website-base-admin')]

    public function render()
    {
        $familiesByYear = \App\Models\FamilyGathering::get();
        return view('livewire.admin.family-gathering-all-years', compact('familiesByYear'));
    }
}
