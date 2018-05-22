<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    //
    protected $fillable = [
        //`name`, `img`, `job`, `Desc`, `user_id`
        'name','value','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
