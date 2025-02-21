<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterMember extends Model
{
    protected $fillable = ['first_name', 'last_name', 'other_names', 'residence', 'gender', 'age', 'date_of_birth',
        'age_category', 'contact', 'church'];
}
