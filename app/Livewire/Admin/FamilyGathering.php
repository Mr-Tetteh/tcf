<?php

namespace App\Livewire\Admin;

use App\Models\family_gathering;
use Livewire\Attributes\Layout;
use Livewire\Component;

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
    public function create()
    {
        $this->validate();
        family_gathering::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'gender' => $this->gender,
            'church' => $this->church
        ]);
        $this->resetForm();
        session()->flash('message', 'Member has been created successfully.');
    }

    public function render()
    {
       $families =  family_gathering::all();
        return view('livewire.admin.family-gathering', compact('families'));
    }
}
