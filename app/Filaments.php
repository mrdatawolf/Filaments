<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Filaments class
 * @property-read Brands        $brand
 * @property-read Types         $type
 * @property-read Users         $users
 * @property-read Printers      $printers
 * @property int                $id
 * @property string             $name
 * @property string             $width
 * @property string             $revision
 */
class Filaments extends Model
{
    protected $fillable= [
        'name',
        'width',
        'revision'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function brand()
    {
        return $this->belongsTo('App\Brands', 'brand_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Types', 'type_id');
    }

    public function users()
    {
        return $this->hasMany('App\Users', 'user_id');
    }

    public function printers()
    {
        return $this->hasMany('App\Printers', 'printer_id');
    }
}
