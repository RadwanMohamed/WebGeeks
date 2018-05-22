<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [

        'name', 'link','img' ,'user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
