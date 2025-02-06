<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'status'];
}
