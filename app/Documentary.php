<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'description',
    ];
}
