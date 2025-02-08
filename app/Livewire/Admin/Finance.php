<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Finance extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $title;
    public $amount;

    public $fincial_id;
    public $isEdit = false;
    public $edited = false;
    public $edited_by;
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
            'user_id' => Auth::id()
        ]);
        $this->resetForm();
        session()->flash('message', 'Financial record Created Successfully.');

    }


    public function edit($id)
    {
       $cash =  \App\Models\Finance::findOrFail($id);
        $this->isEdit = true;
        $this->title = $cash->name;
        $this->amount = $cash->amount;
        $this->fincial_id = $cash->id;

    }

    public function update(){
        $this->validate();

       $cash =  \App\Models\Finance::findOrFail($this->fincial_id);
        $cash->update([
            'name' => $this->title,
            'amount' => $this->amount,
            'edited_by' => Auth::id(),
            'edited' => $this->edited = true

        ]);
        $this->resetForm();
        session()->flash('message', 'Financial record Updated Successfully.');
        $this->isEdit = false;
    }
    public function delete($id)
    {
        \App\Models\Finance::findOrFail($id)->delete();

    }

    public function render()
    {
        $datas = \App\Models\Finance::all();
        return view('livewire.admin.finance', compact('datas'));
    }
}
