<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Finance extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $title;
    public $amount;

    protected $rules = [
        'title' => 'required|string',
        'amount' => 'required|numeric',
    ];


    public function resetForm()
    {
        $this->title ='';
        $this->amount = '';
    }
    public function create()
    {
        $this->validate();

        \App\Models\Finance::create([
            'name' => $this->title,
            'amount' => $this->amount,
        ]);
        $this->resetForm();
        session()->flash('message', 'Financial record Created Successfully.');

    }


    public function render()
    {
        $datas = \App\Models\Finance::all();
        return view('livewire.admin.finance', compact('datas'));
    }
}
