<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Request;
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
    public $sermonId;

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
        'sermon' => 'nullable|file|mimes:mp3,wav,ogg|max:921600',
        'sermon_file' => 'nullable|file|mimes:pdf,doc|max:921600',
        'date' => 'required',

    ];

    public function create()
    {
        $this->validate();

        try {
            $sermonPath = null;
            $sermonFilePath = null;

            if ($this->sermon) {
                $sermonPath = $this->sermon->store('sermon', 'public');
            }

            if ($this->sermon_file) {
                $sermonFilePath = $this->sermon_file->store('sermon', 'public');
            }

            \App\Models\Sermon::create([
                'title' => $this->title,
                'preacher' => $this->preacher,
                'sermon' => $sermonPath,
                'sermon_file' => $sermonFilePath,
                'date' => $this->date,
            ]);
            $this->resetForm();
            session()->flash('message', 'Sermon uploaded successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Upload failed: ' . $e->getMessage());
        }

    }

    public function edit($id)
    {
        $sermon = \App\Models\Sermon::findOrFail($id);

        $this->sermonId = $sermon->id;
        $this->sermon = $sermon;
        $this->title = $sermon->title;
        $this->preacher = $sermon->preacher;
        $this->date = $sermon->date;
        $this->isEdit = true;
    }

public function update()
{
    $sermon = \App\Models\Sermon::findOrFail($this->sermonId);

    $sermonPath = $sermon->sermon;
    $sermonFilePath = $sermon->sermon_file;

    if ($this->sermon instanceof \Illuminate\Http\UploadedFile) {
        $sermonPath = $this->sermon->store('sermon', 'public');
    }

    if ($this->sermon_file instanceof \Illuminate\Http\UploadedFile) {
        $sermonFilePath = $this->sermon_file->store('sermon', 'public');
    }

    $sermon->update([
        'title' => $this->title,
        'preacher' => $this->preacher,
        'sermon' => $sermonPath,
        'sermon_file' => $sermonFilePath,
        'date' => $this->date,
    ]);
    $this->resetForm();
    $this->isEdit = false;
    session()->flash('message', 'Sermon updated successfully.');
}


    public function delete($id)
    {
        \App\Models\Sermon::findOrFail($id)->delete();


    }

    public function render()
    {
        $sermons = \App\Models\Sermon::all();
        return view('livewire.admin.sermon', compact('sermons'));
    }
}
