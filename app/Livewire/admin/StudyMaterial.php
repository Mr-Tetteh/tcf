<?php

namespace App\Livewire\admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudyMaterial extends Component
{
    use WithFileUploads;
    #[Layout('layout.admin.partials.website-base-admin')]

    public $title;
    public $study_material;

    public $Edit = false;
    public $study_material_id;

    protected $rules = [
        'title' => 'required|string',
        'study_material' => 'required|mimes:pdf,doc,docx,ppt,pptx',
    ];

    public function restForm()
    {
        $this->title = '';
        $this->study_material = '';

    }

    public function create()
    {
        $this->validate();

        $filePath = $this->study_material->store('study_material', 'public');

        \App\Models\StudyMaterial::create([
            'title' => $this->title,
            'study_material' => $filePath,
        ]);
        $this->restForm();
        session()->flash('message', 'StudyMaterial has been created.');

    }

    public function edit($id)
    {
        $study = \App\Models\StudyMaterial::findOrFail($id);
        $this->study_material_id = $study->id;
        $this->title = $study->title;
        $this->study_material = $study->study_material;
        $this->Edit = true;

    }

    public function update($study_material_id)

    {
        \App\Models\StudyMaterial::findOrFail($study_material_id)->update([
            'title' => $this->title,
        ]);

    }

    public function delete($id)
    {
        \App\Models\StudyMaterial::findOrFail($id)->delete();
        session()->flash('message', 'StudyMaterial has been deleted.');
    }
    public function render()
    {
        $datas =  \App\Models\StudyMaterial::all();
        return view('livewire.admin.study-material', compact('datas'));
    }
}
