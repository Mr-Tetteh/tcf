<?php

namespace App\Livewire\Admin;
use Livewire\Attributes\Layout;

use Livewire\Component;

class Pledge extends Component
{
#[Layout('layout.admin.partials.website-base-admin')]
    

    
    public $pledge_id;
    public $full_name;
    public $phone_number;
    public $plede_type;
    public $amount_pledged;
    public $pledge_item;
    public $Edit = false;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'phone_number' => 'required|digits_between:9,10',
        'plede_type' => 'required|string|max:20',
        'amount_pledged' => 'nullable|numeric|min:0',
        'pledge_item' => 'nullable|string|max:500',
    ];

    public function resetForm()
    {
        $this->full_name = '';
        $this->phone_number = '';
        $this->plede_type = '';
        $this->amount_pledged = '';
        $this->pledge_item = '';
    }

    public function create()
    {
        $this->validate();

        \App\Models\Pledge::create([
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'plede_type' => $this->plede_type,
            'amount_pledged' => $this->amount_pledged,
            'pledge_item' => $this->pledge_item,
        ]);

        session()->flash('message', 'Pledge Added Successfully.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $pledge = \App\Models\Pledge::findOrFail($id);
        $this->pledge_id = $id;
        $this->full_name = $pledge->full_name;
        $this->phone_number = $pledge->phone_number;
        $this->plede_type = $pledge->plede_type;
        $this->amount_pledged = $pledge->amount_pledged;
        $this->pledge_item = $pledge->pledge_item;
        $this->Edit = true;
    }

    public function update()
    {
        $this->validate();
        $pledge = \App\Models\Pledge::findOrFail($this->pledge_id);
        $pledge->update([
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'plede_type' => $this->plede_type,
            'amount_pledged' => $this->amount_pledged,
            'pledge_item' => $this->pledge_item,
        ]);
        $this->Edit = false;
        session()->flash('message', 'Pledge Updated Successfully.');
        $this->resetForm();
    }

    public function delete($id)
    {
        $pledge = \App\Models\Pledge::findOrFail($id);
        $pledge->delete();
        session()->flash('message', 'Pledge Deleted Successfully.');
    }
    public function render()
    {
        $datas = \App\Models\Pledge::all();
        return view('livewire.admin.pledge', compact('datas'));
    }
}
