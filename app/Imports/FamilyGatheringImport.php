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
           'full_name' => $row[0],
            'contact' => $row[1],
            'denomination' => $row[2] ?? null,
            'residence' => $row[3] ?? null,
            'year' => Carbon::now()->year,
           sendWithSMSONLINEGH(
            '233' . substr($row[1], -9),
            'Hello ' . $row[0] . ', ' .
            'We are delighted to welcome you to the ' . Carbon::now()->year . ' Annual Family Gathering! ' .
            'Get ready for a time of joy, connection, and spiritual renewal. ' .
            'May your stay be filled with blessings, laughter, and the presence of God.  Awurade Yesu!'
        )
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
