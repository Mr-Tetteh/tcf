<?php

namespace App\Livewire\Admin;

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
    public $memmber_id;
    public $isEdit = false;
    public $modal = false;


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
        'church' => 'required',
        'age' => 'required',
        'date_of_birth' => 'required',
        'gender' => 'required',
        'age_category' => 'required',
    ];

    public function toggleModalOn ()
    {
        $this->modal= true;

    }

    public function closeModal()
    {
        $this->modal = false;

    }
    public function edit($id)
    {
        $member = \App\Models\RegisterMember::find($id);
        $this->memmber_id = $member->id;
        $this->first_name = $member->first_name;
        $this->last_name = $member->last_name;
        $this->other_names = $member->other_names;
        $this->residence = $member->residence;
        $this->contact = $member->contact;
        $this->church = $member->church;
        $this->age = $member->age;
        $this->date_of_birth = $member->date_of_birth;
        $this->gender = $member->gender;
        $this->age_category = $member->age_category;
        $this->isEdit = true;
        $this->modal = true;
    }

    public function update()
    {
        $this->validate();
        $member = \App\Models\RegisterMember::findOrFail($this->memmber_id);
        $member->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'church' => $this->church,
            'age' => $this->age,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'age_category' => $this->age_category,
        ]);
        $this->isEdit = false;
        $this->restForm();
        session()->flash('message', 'Member updated successfully.');
        $this->closeModal();
    }

    public function delete($id)
    {
        \App\Models\RegisterMember::findOrFail($id)->delete();
        session()->flash('message', 'Member deleted successfully.');

    }

    public function create()
    {
        $this->validate();
        \App\Models\RegisterMember::create([
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
        $this->modal = false;

    }
    public $search = '';



    public function render()
    {

        $members = \App\Models\RegisterMember::latest()->paginate(10);
        return view('livewire.admin.register-member', compact('members'));
    }
}
