<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FamilyGathering extends Model
{
    protected $fillable = ['full_name', 'contact', 'denomination', 'residence', 'year', 'amount_paid'];



    public function Sluggable()
    {
        return [
            'year' => [
                'source' => Carbon::now()->year,
            ]
        ];

    }

    protected static function booted()
    {
        static::creating(function ($familyGathering) {
            $familyGathering->year = Carbon::now()->year;
        });
    }


}
