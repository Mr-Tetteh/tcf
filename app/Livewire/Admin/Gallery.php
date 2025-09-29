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
    public $id;
    public $galleryId;
    public $isEdit = false;
    use WithFileUploads;


    protected $rules = [
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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

    public function edit($id)
    {
       $gallery = \App\Models\Gallery::findOrFail($id);

       $this->galleryId = $gallery->id;
       $this->name = $gallery->name;
       $this->image = $gallery->image;
       $this->isEdit = true;
    }

    public function update()
    {
       $gallery = \App\Models\Gallery::findOrFail($this->galleryId);

       $imagePath = $gallery->image;
       if ($this->image instanceof \Illuminate\Http\UploadedFile) {
           $imagePath = $this->image->store('images', 'public');
       }

       $gallery->update([
           'name' => $this->name,
           'image' => $imagePath,
       ]);
       $this->resetForm();
       $this->isEdit = false;
       session()->flash('message', 'Image Updated Successfully.');
    }
    public function delete($id)
    {
        \App\Models\Gallery::findOrFail($id)->delete();

    }

    public function render()
    {
        $galleries = GalleryModel::all();
        return view('livewire.admin.gallery', compact('galleries'));
    }
}
