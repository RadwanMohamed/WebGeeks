<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = [
        'name',  'desc','content','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
