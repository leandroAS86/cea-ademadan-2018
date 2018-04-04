<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
     protected $fillable = [
        'schedule_id', 'name', 'attendance', 'report', 'evidence', 
    ];
}
