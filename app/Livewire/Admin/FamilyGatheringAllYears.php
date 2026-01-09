<?php

namespace App\Livewire\Admin;

use App\Models\FamilyGathering;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class FamilyGatheringAllYears extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $IsEdit = false;
    public $full_name;
    public $residence;
    public $contact;
    public $denomination;
    public $year;
    public $family_id;
    public $amount_paid;


        protected $rules = [
        'full_name' => 'required|string',
        'contact' => 'required|digits_between:9,10',
        'residence' => 'required|string',
        'denomination' => 'required|string',
        'amount_paid' => 'numeric',

    ];

    public function resetForm()
    {
        $this->full_name = '';
        $this->contact = '';
        $this->residence = '';
        $this->denomination = '';
        $this->csv = '';
        $this->amount_paid = '';

    }
    public function edit($id)
    {
        $family = \App\Models\FamilyGathering::findOrFail($id);
        $this->family_id = $family->id;
        $this->full_name = $family->full_name;
        $this->residence = $family->residence;
        $this->contact = $family->contact;
        $this->denomination = $family->denomination;
        $this->amount_paid = $family->amount_paid;
        $this->IsEdit = true;

    }

    public function update()
    {
        $this->validate();
        $family = \App\Models\FamilyGathering::findOrFail($this->family_id);
        $family->update([
            'full_name' => $this->full_name,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'denomination' => $this->denomination,
            'amount_paid' => $this->amount_paid
        ]);
        $this->resetForm();
        session()->flash('message', 'Family gathering details updated successfully.');
        $this->IsEdit = false;

    }

    public function delete($id)
    {
        \App\Models\FamilyGathering::findOrFail($id)->delete();
        session()->flash('message', 'Family gathering details deleted successfully.');

    }


    public function cancelEdit()
    {
        $this->IsEdit = false;
    }

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
