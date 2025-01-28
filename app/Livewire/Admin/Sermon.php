<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Sermon extends Component
{

    use WithFileUploads;
    #[Layout('layout.admin.partials.website-base-admin')]
    public $title;
    public $slug;
    public $preacher;
    public $sermon;
    public $date;

    public function resetForm()
    {
        $this->title = null;
        $this->slug = null;
        $this->preacher = null;
        $this->sermon = null;
        $this->date = null;
    }

    protected $rules = [
        'title' => 'required',
        'preacher' => 'required',
        'sermon' => 'required|file',
        'date' => 'required',

    ];

    public function create()
    {
        $this->validate();

        $sermonPath = $this->sermon ? $this->sermon->store('sermon', 'public') : null;

        \App\Models\Sermon::create([
            'title' => $this->title,
            'preacher' => $this->preacher,
            'sermon' => $sermonPath,
            'date' => $this->date,

        ]);
        $this->resetForm();
        session()->flash('message', 'Sermon uploaded successfully.');

    }


    public function render()
    {
        $sermons = \App\Models\Sermon::all();
        return view('livewire.admin.sermon', compact('sermons'));
    }
}
