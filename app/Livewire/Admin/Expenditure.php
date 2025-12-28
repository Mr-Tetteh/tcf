<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;


class Expenditure extends Component
{

        #[Layout('layout.admin.partials.website-base-admin')]

    public $name;
    public $amount;
    public $purpose;
    public $expenditure_id;
    public $isEdit = false;

    public $deleteId = null;

    public function resetInputFields()
    {
        $this->name = '';
        $this->amount = '';
        $this->purpose = '';
        $this->expenditure_id = null;
        $this->isEdit = false;
    }

    protected $rules = [
        'name' => 'required',
        'amount' => 'required|numeric',
        'purpose' => 'required',
    ];


    public function create()
    {
        $this->validate();

        \App\Models\Expenditure::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'purpose' => $this->purpose,
        ]);

        $this->resetInputFields();
        session()->flash('message', 'Expenditure Created Successfully.');
    }

    public function edit($id)
    {
        $expenditure = \App\Models\Expenditure::findOrFail($id);
        $this->expenditure_id = $id;
        $this->name = $expenditure->name;
        $this->amount = $expenditure->amount;
        $this->purpose = $expenditure->purpose;
        $this->isEdit = true;
    }   

    public function update()
    {
        $this->validate();

        $expenditure = \App\Models\Expenditure::findOrFail($this->expenditure_id);
        $expenditure->update([
            'name' => $this->name,
            'amount' => $this->amount,
            'purpose' => $this->purpose,
        ]);

        $this->isEdit = false;

        $this->resetInputFields();
        session()->flash('message', 'Expenditure Updated Successfully.');
    }   


    public function delete()
    {
        $expenditure = \App\Models\Expenditure::findOrFail($this->deleteId);
        $expenditure->delete();
        session()->flash('message', 'Expenditure Deleted Successfully.');
        $this->deleteId = null;
    }   

    public function render()
    {
        $expenditures = \App\Models\Expenditure::all();
        return view('livewire.admin.expenditure', compact('expenditures'));
    }
}
