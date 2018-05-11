<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filaments extends Model
{
    protected $fillable= [
        'name',
        'width',
        'revision'
    ];
}
