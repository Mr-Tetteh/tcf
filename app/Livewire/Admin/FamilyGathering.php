<?php

namespace App\Livewire\Admin;

use App\Models\family_gathering;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Symfony\Component\Mime\Message;

class FamilyGathering extends Component
{
    #[Layout('layout.Admin.partials.website-base-admin')]
    public $first_name;
    public $last_name;
    public $other_names;
    public $residence;
    public $contact;
    public $church;
    public $gender;
    public $year;
    public $family_id;
    public $isEdit = false;


    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'other_names' => 'required|string',
        'residence' => 'required|string',
        'contact' => 'required|digits:10',
        'gender' => 'required|string',
        'church' => 'required|string',

    ];

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->other_names = '';
        $this->residence = '';
        $this->contact = '';
        $this->gender = '';
        $this->church = '';

    }

    public function edit($id)
    {
        $family = family_gathering::findOrFail($id);
        $this->family_id = $family->id;
        $this->first_name = $family->first_name;
        $this->last_name = $family->last_name;
        $this->other_names = $family->other_names;
        $this->residence = $family->residence;
        $this->contact = $family->contact;
        $this->gender = $family->gender;
        $this->church = $family->church;
        $this->isEdit = true;

    }

    public function update()
    {
        $this->validate();
        $family = family_gathering::findOrFail($this->family_id);
        $family->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'gender' => $this->gender,
            'church' => $this->church
        ]);
        $this->resetForm();
        session()->flash('message', 'Family gathering details updated successfully.');
        $this->isEdit = false;

    }

    public function delete($id)
    {
        family_gathering::findOrFail($id)->delete();
        session()->flash('message', 'Family gathering details deleted successfully.');

    }
    public function create()
    {
        $this->validate();
        family_gathering::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => '233'.substr($this->contact, -9),
            'gender' => $this->gender,
            'church' => $this->church,
            'year' => Carbon::now()->year,
        ]);
        \sendWithSMSONLINEGH('233'.substr($this->contact, -9),  'Hello '. ($this->gender == 'male' ? 'Mr' : "Mrs "). $this->first_name . ' ' . $this->last_name . ', ' .
            'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
            'Get ready for a time of joy, connection, and spiritual renewal. ' .
            'May your stay be filled with blessings, laughter, and the presence of God.');
        $this->resetForm();

        session()->flash('message', 'Member has been created successfully.');


    }

    public function render()
    {
        $familiesByYear = family_gathering::select('year')
            ->groupBy('year')
            ->get()
            ->mapWithKeys(function ($family) {
                return [$family->year => family_gathering::where('year', $family->year)->get()];
            });

        $males = family_gathering::select('year')
            ->groupBy('year')
            ->get()
            ->mapWithKeys(function ($family) {
                return [$family->year => family_gathering::where('year', $family->year)->where('gender', 'Male')->count()];
            });

        // Group females by year
        $females = family_gathering::select('year')
            ->groupBy('year')
            ->get()
            ->mapWithKeys(function ($family) {
                return [$family->year => family_gathering::where('year', $family->year)->where('gender', 'Female')->count()];
            });

        return view('livewire.admin.family-gathering', compact('familiesByYear', 'males', 'females'));
    }
}
