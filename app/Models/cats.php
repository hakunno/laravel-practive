<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cats extends Model
{   
    protected $table = 'cats';
    protected $fillable = [
        'name',
        'age',
        'breed',
        'color',
    ];
}
