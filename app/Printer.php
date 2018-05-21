<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Printer class
 * @property-read Brand        $brand
 * @property-read Type         $types
 * @property-read User         $users
 * @property-read Filament     $filaments
 * @property int                $id
 * @property string             $name
 * @property string             $version
 */
class Printer extends Model
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
        return $this->belongsTo('App\Brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function filaments()
    {
        return $this->belongsToMany('App\Filament');
    }
}
