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
    public $sermon_file;
    public $isEdit = false;

    public function resetForm()
    {
        $this->title = null;
        $this->slug = null;
        $this->preacher = null;
        $this->sermon = null;
        $this->date = null;
        $this->sermon_file = null;
    }

    protected $rules = [
        'title' => 'required',
        'preacher' => 'required',
        'sermon' => 'required|file|mimes:mp3,wav,ogg|max:921600',
        'date' => 'required',

    ];

    public function edit($id)
    {
        $sermon = \App\Models\Sermon::findOrFail($id);

        $this->sermon = $sermon;
        $this->title = $sermon->title;
        $this->preacher = $sermon->preacher;
        $this->date = $sermon->date;
        $this->isEdit = true;
    }

    public function create()
    {

        $this->validate();

        try {
            $sermonPath = $this->sermon->store('sermon', 'public');
            \App\Models\Sermon::create([
                'title' => $this->title,
                'preacher' => $this->preacher,
                'sermon' => $sermonPath,
                'date' => $this->date,
            ]);
            $this->resetForm();
            session()->flash('message', 'Sermon uploaded successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Upload failed: ' . $e->getMessage());
        }
    }


    public function render()
    {
        $sermons = \App\Models\Sermon::all();
        return view('livewire.admin.sermon', compact('sermons'));
    }
}
