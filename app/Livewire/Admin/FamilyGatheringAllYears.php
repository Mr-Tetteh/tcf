<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class FamilyGatheringAllYears extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $familiesByYear = \App\Models\FamilyGathering::whereyear('created_at',  Carbon::now()->year)->latest()->paginate(13);
        $number_of_registered_members = \App\Models\FamilyGathering::whereYear('created_at', Carbon::now()->year)->count();
        $number_of_registered_males = \App\Models\FamilyGathering::whereYear('created_at', Carbon::now()->year)->where('gender', 'male')->count();
        $number_of_registered_females = \App\Models\FamilyGathering::whereYear('created_at', Carbon::now()->year)->where('gender', 'female')->count();


        
        return view('livewire.admin.family-gathering-all-years', compact('familiesByYear', 'number_of_registered_members', 'number_of_registered_males', 'number_of_registered_females') );
    }
}
