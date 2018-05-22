<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [

        'name', 'img' ,'user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function articles()
    {
        return $this->hasMany("App\Articles");
    }
    public function ports()
    {
        return $this->hasMany("App\Port");
    }
}
