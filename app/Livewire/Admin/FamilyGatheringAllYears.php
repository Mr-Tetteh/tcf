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
    $familiesByYear = FamilyGathering::latest()
        ->get()
        ->groupBy('year')
        ->map(function ($familiesInYear) {
            return $familiesInYear->groupBy(function ($family) {
                return Carbon::parse($family->created_at)->format('Y-m-d');
            });
        });

    $number_of_registered_members =
        FamilyGathering::whereYear('created_at', Carbon::now()->year)->count();

    $number_of_registered_members_without_amount_paid =
        FamilyGathering::where('amount_paid', '0.00')->count();

    return view(
        'livewire.admin.family-gathering-all-years',
        compact(
            'familiesByYear',
            'number_of_registered_members',
            'number_of_registered_members_without_amount_paid'
        )
    );
}

}
