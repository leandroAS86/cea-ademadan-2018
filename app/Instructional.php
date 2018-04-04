<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructional extends Model
{
    protected $fillable = [
        'schedule_id', 'name', 'leadership',  'evidence', 
    ];
}
