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

    public function types()
    {
        return $this->belongsTo('App\Types', 'type_id', 'id');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Brands');
    }

    public function users()
    {
        return $this->belongsToMany('App\Users', 'user_id');
    }

    public function printers()
    {
        return $this->belongsToMany('App\Printers', 'printer_id');
    }
}
