<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    //

    protected $fillable = [
        'name','category', 'content', 'desc','img','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function categories()
    {
        return $this->belongsTo("App\Categories","category");
    }
}
