<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery as GalleryModel; // Add this alias

class Gallery extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $name;
    public $image;
    use WithFileUploads;


    protected $rules = [
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $messages = [
        'image.image' => 'The :attribute must be a valid image.',
        'image.mimes' => 'The :attribute must be a file of type: :values.',
        'image.max' => 'The :attribute should not be greater than 2048.',
        'name.required' => 'The Title of the image field is required.',
    ];

    public function resetForm()
    {
        $this->name = '';
        $this->image = '';
    }

    public function create()
    {
        $this->validate();

        $image = $this->image->store('images', 'public');
        GalleryModel::create([
            'name' => $this->name,
            'image' => $image,
        ]);

        session()->flash('message', 'Image Added Successfully.');
        $this->resetForm();

    }

    public function render()
    {
        $galleries = GalleryModel::all();
        return view('livewire.admin.gallery', compact('galleries'));
    }
}
