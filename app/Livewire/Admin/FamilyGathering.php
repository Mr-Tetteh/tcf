<?php

namespace App\Livewire\Admin;


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

    #[Layout('layout.admin.partials.website-base-admin')]
    public $full_name;
    public $residence;
    public $contact;
    public $denomination;
    public $year;
    public $family_id;
    public $isEdit = false;

    public $csv;
    public $uploadError = '';
    public $uploadSuccess = '';
    public $amount_paid;

    protected $rules = [
        'full_name' => 'required|string',
        'contact' => 'required|digits_between:9,10',
        'residence' => 'required|string',
        'denomination' => 'required|string',

    ];

    public function resetForm()
    {
        $this->full_name = '';
        $this->contact = '';
        $this->residence = '';
        $this->denomination = '';
        $this->csv = '';
        $this->amount_paid = '';

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
        $this->full_name = $family->full_name;
        $this->residence = $family->residence;
        $this->contact = $family->contact;
        $this->denomination = $family->denomination;
        $this->amount_paid = $family->amount_paid;
        $this->isEdit = true;

    }

    public function update()
    {
        $this->validate();
        $family = \App\Models\FamilyGathering::findOrFail($this->family_id);
        $family->update([
            'full_name' => $this->full_name,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'denomination' => $this->denomination,
            'amount_paid' => $this->amount_paid
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
            'full_name' => $this->full_name,
            'residence' => $this->residence,
            'contact' => $this->contact,
            'denomination' => $this->denomination,
            'amount_paid' => $this->amount_paid
        ]);
        \sendWithSMSONLINEGH(
            '233' . substr($this->contact, -9),
            'Hello, ' . $this->full_name . ', ' .
            'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
            'Get ready for a time of joy, connection, and spiritual renewal. ' .
            'May your stay be filled with blessings, laughter, and the presence of God. Awurade Yesu!'
        );

$this->resetForm();

        $this->resetForm();

        session()->flash('message', 'Member has been created successfully.');


    }

    public function render()
    {


        $current_year = Carbon::now()->year;

        $familiesByYear = \App\Models\FamilyGathering::where('year', $current_year)->latest()->get();


        return view('livewire.admin.family-gathering', compact('familiesByYear', ));
    }
}
