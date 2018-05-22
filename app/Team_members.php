<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_members extends Model
{
    //
    protected $fillable = [
        //`name`, `img`, `job`, `Desc`, `user_id`
        'name','img','job','Desc','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
