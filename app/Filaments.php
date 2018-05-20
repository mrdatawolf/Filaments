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
        'revision',
        'type_id',
        'brand_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Types');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Brands');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function printers()
    {
        return $this->belongsToMany('App\Printers');
    }

  
}
