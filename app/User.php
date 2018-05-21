<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
/**
 * @property-read Filaments     $filaments
 * @property-read Printers      $printers
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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
        return $this->hasMany('App\Brand', 'brand_id');
    }

    public function printers()
    {
        return $this->hasMany('App\Printer', 'printer_id');
    }

    public function filaments()
    {
        return $this->hasMany('App\Filament', 'filament_id');
    }
}
