<?php

namespace App\Imports;

use App\Models\RegisterMember;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RegisterMemberImport implements ToModel, WithStartRow
{

    public function model( array $rows )
    {
        return new RegisterMember([
           'first_name' => $rows[0],
           'last_name' => $rows[1],
           'other_names' => $rows[2] ?? null,
           'residence' => $rows[3],
            'contact' => $rows[4],
            'age' => $rows[5],
            'church' => $rows[6],
            'date_of_birth' => Carbon::parse($rows[7])->format('Y-m-d'),
            'gender' => $rows[8],
            'age_category' => $rows[9],
        ]);
    }


    public function startRow(): int
    {
        return 2;
    }
}

