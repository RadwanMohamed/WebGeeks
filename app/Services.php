<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        //``name`, `Desc`, `user_id`
        'name','logo','Desc','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
