<?php

namespace App\Livewire\Admin;

use App\Models\registermemmber;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterMember extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $first_name;
    public $last_name;
    public $other_names;
    public $residence;
    public $contact;
    public $church;
    public $age;
    public $date_of_birth;
    public $gender;
    public $age_category;


    public function restForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->other_names = '';
        $this->residence = '';
        $this->contact = '';
        $this->age = '';
        $this->date_of_birth = '';
        $this->gender = '';
        $this->age_category = '';
        $this->church = '';


    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'other_names' => 'required',
        'residence' => 'required',
        'contact' => 'required|digits:10',
        'church'=> 'required',
        'age' => 'required',
        'date_of_birth' => 'required',
        'gender' => 'required',
        'age_category' => 'required',
];
    public function create()
    {
        $this->validate();
        registermemmber::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'age' => $this->age,
            'church' => $this->church,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'age_category' => $this->age_category,
        ]);
        $this->restForm();
        session()->flash('message', 'Member added successfully.');

    }
    public function render()
    {

        $members = registermemmber::all();
        return view('livewire.admin.register-member', compact('members'));
    }
}
