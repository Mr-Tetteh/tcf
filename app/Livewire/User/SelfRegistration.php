<?php

namespace App\Livewire\User;
use Livewire\Attributes\Layout;
use Carbon\Carbon;

use Livewire\Component;

class SelfRegistration extends Component
{
    #[Layout('layout.user.partials.website-base-user')]

      public $full_name;
    public $residence;
    public $contact;
    public $denomination;
    public $year;
    public $family_id;
    public $isEdit = false;

    public $csv;
    public $uploadError = '';
    public $uploadSuccess = '';



     protected $rules = [
        'full_name' => 'required|string',
        'contact' => 'required|digits_between:9,10',
        'residence' => 'required|string',
        'denomination' => 'required|string',

    ];

    public function resetForm()
    {
        $this->full_name = '';
        $this->contact = '';
        $this->residence = '';
        $this->denomination = '';
        $this->csv = '';

    }




    public function create()
    {
        $this->validate();
        \App\Models\FamilyGathering::create([
            'full_name' => $this->full_name,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'denomination' => $this->denomination,
        ]);
        \sendWithSMSONLINEGH(
            '233' . substr($this->contact, -9),
            'Hello, ' . $this->full_name . ', ' .
            'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
            'Get ready for a time of joy, connection, and spiritual renewal. ' .
            'May your stay be filled with blessings, laughter, and the presence of God. Awurade Yesu!'
        );



        session()->flash('message', 'Member has been created successfully.');
         $this->resetForm();
         redirect()->to('/');

        


    }
    public function render()
    {
        return view('livewire.user.self-registration');
    }
}
