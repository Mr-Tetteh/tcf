<?php

namespace App\Livewire\Admin;

use App\Models\Records;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RecordManagement extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $title;
    public $start;
    public $end;

    protected $rules = [
        'title' => 'required',
        'start' => 'required',
    ];

    protected $messages = [
        'title.required' => 'The title field is required.',
        'start.required' => 'The start time for the program is required.',
        'end.required' => 'The end time for the program is required.',
    ];

    public function resetForm()
    {
        $this->title = '';
        $this->start = '';
        $this->end = '';

    }

    public function create()
    {
        $this->validate();
        Records::create([
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
        ]);

        $this->resetForm();
        session()->flash('message', 'Record created successfully.');

    }
    public function render()
    {
        $records = Records::all();
        return view('livewire.admin.record-management', compact('records'));
    }
}
