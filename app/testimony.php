<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimony extends Model
{
    protected $fillable = [
        //``title`, ``content, `name`, `user_id`
     'title', 'content' ,'name','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}