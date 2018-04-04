<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresentationGame extends Model
{
     protected $fillable = [
        'schedule_id', 'name', 'attendance', 'report', 'evidence', 
    ];
}
