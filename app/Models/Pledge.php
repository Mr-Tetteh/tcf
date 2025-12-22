<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'plede_type',
        'amount_pledged',
        'pledge_item',
    ];
}
