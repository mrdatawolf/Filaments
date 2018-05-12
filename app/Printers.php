<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Printers class
 * @property-read Brands        $brand
 * @property-read Types         $types
 * @property int                $id
 * @property string             $name
 * @property string             $version
 */
class Printers extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'printers';


    protected $fillable= [
        'name',
        'version'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public $fieldsToTrack = ['name', 'version'];

    protected $hidden = [];

    public function brand()
    {
        return $this->belongsTo('App\Brands', 'brand_id');
    }

    public function types()
    {
        return $this->hasMany('App\Types');
    }
}
