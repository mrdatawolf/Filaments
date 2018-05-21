<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read Filament     $filaments
 * @property-read Printer      $printers
 */
class Type extends Model
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
        return $this->belongsToMany('App\Printer');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filaments()
    {
        return $this->belongsTo('App\Filament');
    }
}
