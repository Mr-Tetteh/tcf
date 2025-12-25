<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Finance extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
public $deleteId;

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
   public function delete()
{
    \App\Models\Finance::findOrFail($this->deleteId)->delete();
    session()->flash('message', 'Record deleted successfully.');
    $this->deleteId = null;
}




   
public function render()
{
    // Group by date first, then by name within each date
    $datas = \App\Models\Finance::whereYear('created_at',  Carbon::now()->year)->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function($item) {
            return $item->created_at->format('Y-m-d'); // Group by date
        })
        ->map(function($dayRecords) {
            return $dayRecords->groupBy('name'); // Then group by name within each day
        });
    
    return view('livewire.admin.finance', compact('datas'));
}
}
