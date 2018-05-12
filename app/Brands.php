<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Brands class
 * @property-read Filaments     $filaments
 * @property-read Printers      $printers
 * @property int                $id
 * @property string             $name
 * @property string             $slug
 */
class Brands extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'brands';

    /**
     * {@inheritdoc}
     */
    protected $fillable= [
        'name',
        'slug'
    ];

    public $fieldsToTrack = ['name', 'slug'];

    protected $hidden = [];

    protected $dates = ['created_at', 'updated_at'];

    public function filaments()
    {
        return $this->hasMany('App\Filaments');
    }

    public function printers()
    {
        return $this->hasMany('App\Printers');
    }

}
