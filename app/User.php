<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

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
