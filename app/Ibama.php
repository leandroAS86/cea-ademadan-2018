<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibama extends Model
{
    protected $fillable = [
 		'date', 'title', 'report' 
    ];
}
