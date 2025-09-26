<?php

namespace App\Livewire\admin;


use App\Imports\FamilyGatheringImport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Mime\Message;

class FamilyGathering extends Component
{
    use WithFileUploads;

    #[Layout('layout.Admin.partials.website-base-admin')]
    public $first_name;
    public $last_name;
    public $other_names;
    public $residence;
    public $contact;
    public $church;
    public $gender;
    public $year;
    public $family_id;
    public $isEdit = false;

    public $csv;
    public $uploadError = '';
    public $uploadSuccess = '';

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'residence' => 'required|string',
        'contact' => 'required|digits_between:9,10',
        'gender' => 'required|string',
        'church' => 'required|string',

    ];

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->other_names = '';
        $this->residence = '';
        $this->contact = '';
        $this->gender = '';
        $this->church = '';
        $this->csv = '';

    }

    public function import()
    {
        $this->validate([
            'csv' => 'required|mimes:csv,xlsx,xlsm,xls'
        ], [
                'csv.required' => 'File can not be uploaded empty.',
                'csv.mimes' => 'The file must be a CSV, XLSX, XLSM, or XLS.'
            ]
        );

        $extension = $this->csv->getClientOriginalExtension();
        $filePath = $this->csv->store('temp');
        $fullPath = Storage::path($filePath);

        Excel::import(new FamilyGatheringImport, $fullPath);
        return redirect('/admin/family_gathering')->with('success', 'All good!');


    }

    public function edit($id)
    {
        $family = \App\Models\FamilyGathering::findOrFail($id);
        $this->family_id = $family->id;
        $this->first_name = $family->first_name;
        $this->last_name = $family->last_name;
        $this->other_names = $family->other_names;
        $this->residence = $family->residence;
        $this->contact = $family->contact;
        $this->gender = $family->gender;
        $this->church = $family->church;
        $this->isEdit = true;

    }

    public function update()
    {
        $this->validate();
        $family = \App\Models\FamilyGathering::findOrFail($this->family_id);
        $family->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'gender' => $this->gender,
            'church' => $this->church
        ]);
        $this->resetForm();
        session()->flash('message', 'Family gathering details updated successfully.');
        $this->isEdit = false;

    }

    public function delete($id)
    {
        \App\Models\FamilyGathering::findOrFail($id)->delete();
        session()->flash('message', 'Family gathering details deleted successfully.');

    }


    public function export()
    {
        return response()->download(public_path('downloads/Annual Family Gathering Registration .xlsx'));

    }

    public function create()
    {
        $this->validate();
        \App\Models\FamilyGathering::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'residence' => $this->residence,
            'contact' => '233' . substr($this->contact, -9),
            'gender' => $this->gender,
            'church' => $this->church,
        ]);
        \sendWithSMSONLINEGH('233' . substr($this->contact, -9), 'Hello ' . ($this->gender == 'male' ? 'Mr' : "Mrs ") . $this->first_name . ' ' . $this->last_name . ', ' .
            'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
            'Get ready for a time of joy, connection, and spiritual renewal. ' .
            'May your stay be filled with blessings, laughter, and the presence of God.');
        $this->resetForm();

        session()->flash('message', 'Member has been created successfully.');


    }

    public function render()
    {


        $current_year = Carbon::now()->year;

        $familiesByYear = \App\Models\FamilyGathering::where('year', $current_year)->latest()->paginate(10);

        $males = \App\Models\FamilyGathering::where('year', $current_year)->where('gender', 'Male')->count();
        $females = \App\Models\FamilyGathering::where('year', $current_year)->where('gender', 'Female')->count();


        return view('livewire.admin.family-gathering', compact('familiesByYear', 'males', 'females'));
    }
}
