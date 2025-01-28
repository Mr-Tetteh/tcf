<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sermon extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'preacher', 'slug', 'date', 'sermon'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }
}
