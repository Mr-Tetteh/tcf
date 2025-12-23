<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['event_name','event_time', 'event_date', 'event_location', 'event_image', 'event_host',
         'event_speaker_1', 'event_speaker_2', 'event_speaker_3', 'event_speaker_4', 'event_speaker_5', 'event_speaker_6', 'event_speaker_7', 'self_registration_link'];
}
