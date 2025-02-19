<?php

namespace App\Imports;

use App\Models\FamilyGathering;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FamilyGatheringImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {
        return new FamilyGathering([
           'first_name' => $row[0],
            'last_name' => $row[1],
            'other_names' => $row[2],
            'gender' => $row[3],
            'residence' => $row[4],
            'contact' => $row[5],
            'church' => $row[6],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
