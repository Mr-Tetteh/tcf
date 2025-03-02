<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Events extends Component
{
    use WithFileUploads;

    #[Layout('layout.admin.partials.website-base-admin')]
    public $event_name;
    public $event_date;
    public $event_time;
    public $event_location;
    public $event_host;
    public $event_image;
    public $event_speaker_1;
    public $event_speaker_2;
    public $event_speaker_3;
    public $event_speaker_4;
    public $isEdit = false;
    public $event_id;


    protected $rules = [
        'event_name' => 'required|string',
        'event_date' => 'required|string',
        'event_time' => 'required',
        'event_location' => 'required|string',
        'event_host' => 'required|string',
        'event_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
        'event_speaker_1' => 'nullable|string',
        'event_speaker_2' => 'nullable|string',
        'event_speaker_3' => 'nullable|string',
        'event_speaker_4' => 'nullable|string',
    ];

    protected $messages = [
        'event_speaker_1.required' => 'The main speaker  field is required.',
        'event_speaker_2.string' => 'The main speaker a string.',
        'event_speaker_3.string' => 'The main speaker a string.',
        'event_speaker_4.string' => 'The main speaker a string.',
    ];

    public function resetForm()
    {
        $this->event_name = '';
        $this->event_date = '';
        $this->event_time = '';
        $this->event_location = '';
        $this->event_host = '';
        $this->event_image = '';
        $this->event_speaker_1 = '';
        $this->event_speaker_2 = '';
        $this->event_speaker_3 = '';
        $this->event_speaker_4 = '';
    }


    public function edit($id)
    {
        $event = \App\Models\Events::findOrFail($id);
        $this->isEdit = true;
        $this->event_id = $event->id;
        $this->event_name = $event->event_name;
        $this->event_date = $event->event_date;
        $this->event_time = $event->event_time;
        $this->event_location = $event->event_location;
        $this->event_host = $event->event_host;
        $this->event_image = $event->event_image;
        $this->event_speaker_1 = $event->event_speaker_1;
        $this->event_speaker_2 = $event->event_speaker_2;
        $this->event_speaker_3 = $event->event_speaker_3;
        $this->event_speaker_4 = $event->event_speaker_4;

    }

    public function update()
    {
        $this->validate();

        if ($this->event_image instanceof TemporaryUploadedFile) {
            $filePath = $this->event_image->store('events', 'public');
        } else {
            $filePath = $this->event_image;
        }

        \App\Models\Events::findOrFail($this->event_id)->update([
            'event_name' => $this->event_name,
            'event_date' => $this->event_date,
            'event_time' => $this->event_time,
            'event_location' => $this->event_location,
            'event_host' => $this->event_host,
            'event_image' => $filePath,
            'event_speaker_1' => $this->event_speaker_1,
            'event_speaker_2' => $this->event_speaker_2,
            'event_speaker_3' => $this->event_speaker_3,
            'event_speaker_4' => $this->event_speaker_4,
        ]);

        session()->flash('message', 'Event updated successfully.');
        $this->resetForm();
        $this->isEdit = false;
    }

    public function create()
    {
        $this->validate();
        if ($this->event_image != null) {
            $filePath = $this->event_image->store('events', 'public');
        } else {
            $filePath = null;
        }

        \App\Models\Events::create([
            'event_name' => $this->event_name,
            'event_date' => $this->event_date,
            'event_time' => $this->event_time,
            'event_location' => $this->event_location,
            'event_host' => $this->event_host,
            'event_image' => $filePath,
            'event_speaker_1' => $this->event_speaker_1,
            'event_speaker_2' => $this->event_speaker_2,
            'event_speaker_3' => $this->event_speaker_3,
            'event_speaker_4' => $this->event_speaker_4,
        ]);
        session()->flash('message', 'Event created successfully.');
        $this->resetForm();
    }

    public function delete($id)
    {
        \App\Models\Events::findOrFail($id)->delete();
        session()->flash('message', 'Event deleted successfully.');
    }

    public function render()
    {
        $records = \App\Models\Events::all();
        return view('livewire.admin.events', compact('records'));
    }
}
