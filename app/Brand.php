<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Brand class
 * @property-read Filament     $filaments
 * @property-read Printer      $printers
 * @property int                $id
 * @property string             $name
 * @property string             $slug
 */
class Brand extends Model
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
        return $this->hasMany('App\Filament');
    }

    public function printers()
    {
        return $this->hasMany('App\Printer');
    }

}
