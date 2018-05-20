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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function printers()
    {
        return $this->belongsToMany('App\Printers');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filaments()
    {
        return $this->belongsTo('App\Filaments');
    }
}
