<?php

namespace App\Livewire\User;

use App\Models\Faqs;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Contact extends Component
{
    #[Layout('layout.user.partials.website-base-user')]

    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|digits:10',
        'message' => 'required',
    ];

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';

    }

    public function create()
    {
        $this->validate();
        Faqs::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);
        $this->resetForm();
        session()->flash('message', 'Your message has been sent we will respond as soon as possible.');
    }

    public function render()
    {
        return view('livewire.user.contact');
    }
}
