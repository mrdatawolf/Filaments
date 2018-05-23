<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Temperature class
 * @property-read User          $user
 * @property-read Filament      $filament
 * @property-read Printer       $printer
 * @property int                $id
 * @property double             $celsius
 * @property string             $version
 */
class Temperature extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'temperatures';


    protected $fillable= [
        'celsius',
        'user_id',
        'filament_id',
        'printer_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public $fieldsToTrack = ['celsius', 'user_id', 'filament_id', 'printer_id'];

    protected $hidden = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filament()
    {
        return $this->belongsTo('App\Filament');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function printer()
    {
        return $this->belongsTo('App\Printer');
    }

}
