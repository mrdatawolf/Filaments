<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read Filaments     $filaments
 * @property-read Printers      $printers
 */
class Users extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function brands()
    {
        return $this->hasMany('App\Brands', 'brand_id');
    }

    public function printers()
    {
        return $this->hasMany('App\Printers', 'printer_id');
    }

    public function filaments()
    {
        return $this->hasMany('App\Filaments', 'filament_id');
    }
}
