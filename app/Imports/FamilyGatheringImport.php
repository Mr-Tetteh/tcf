<?php

namespace App\Imports;

use App\Models\FamilyGathering;
use Carbon\Carbon;
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
            'other_names' => $row[2] ?? null,
            'gender' => $row[3],
            'residence' => $row[4],
            'contact' => $row[5],
            'church' => $row[6],
            \sendWithSMSONLINEGH('233'.substr($row[5], -9),  'Hello '. ($row[3] == 'Male' ? 'Mr ' : "Mrs "). $row[0] . ' ' . $row[1] . ', ' .
                'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
                'Get ready for a time of joy, connection, and spiritual renewal. ' .
                'May your stay be filled with blessings, laughter, and the presence of God.')
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
