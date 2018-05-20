<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Printers class
 * @property-read Brands        $brand
 * @property-read Types         $types
 * @property-read Users         $users
 * @property-read Filaments     $filaments
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
        'version',
        'brand_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public $fieldsToTrack = ['name', 'version'];

    protected $hidden = [];

    public function brand()
    {
        return $this->hasOne('App\Brands');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany('App\Types');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brands()
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
    public function filaments()
    {
        return $this->belongsToMany('App\Filaments');
    }
}
