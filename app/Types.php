<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read Filaments     $filaments
 * @property-read Printers      $printers
 */
class Types extends Model
{
    protected $fillable= [
        'name',
        'slug'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function printers()
    {
        return $this->hasMany('App\Printers');
    }

    public function filaments()
    {
        return $this->hasMany('App\Filaments');
    }
}
