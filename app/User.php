<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin','name', 'email', 'password','img'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function port()
    {
        return $this->hasMany("App\Port");
    }
    public function Team_members()
    {
        return $this->hasMany("App\Team_members");
    }
    public function skills()
    {
        return $this->hasMany("App\Skills");
    }
    public function services()
    {
        return $this->hasMany("App\Services");
    }
    public function testimonies()
    {
        return $this->hasMany("App\testimony");
    }
    public function pricingplan()
    {
        return $this->hasMany("App\PricingPlan");
    }
    public function clients()
    {
        return $this->hasMany("App\Clients");
    }
    public function articles()
    {
        return $this->hasMany("App\Articles");
    }
    public function cat()
    {
        return $this->hasMany("App\Categories");
    }
    public function settings()
    {
        return $this->hasMany("App\Settings");
    }
}
