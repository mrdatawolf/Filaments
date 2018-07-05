<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Filament class
 * @property-read Brand         $brand
 * @property-read Type          $type
 * @property-read User          $users
 * @property-read Printer       $printers
 * @property-read Temperature   $temperature
 * @property int                $id
 * @property string             $name
 * @property string             $width
 * @property string             $revision
 */
class Filament extends Model
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
        return $this->belongsTo('App\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function temperature()
    {
        return $this->belongsTo('App\Temperature');
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
    public function printers()
    {
        return $this->belongsToMany('App\Printer');
    }
}
