<?php

namespace App\Livewire\Admin;

use App\Models\FamilyGathering;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class FamilyGatheringAllYears extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $familiesByYear = FamilyGathering::latest()->
            ->get()
            ->groupBy('year');
        $number_of_registered_members = \App\Models\FamilyGathering::whereYear('created_at', Carbon::now()->year)->count();
        return view('livewire.admin.family-gathering-all-years', compact('familiesByYear', 'number_of_registered_members') );
    }
}
