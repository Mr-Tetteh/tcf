<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class family_gathering extends Model
{
    protected $fillable = ['first_name', 'last_name', 'other_names', 'residence', 'gender', 'contact', 'church'];
}
