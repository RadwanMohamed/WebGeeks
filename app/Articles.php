<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [

        'title','img', 'content','category_id' ,'user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function categories()
    {
        return $this->belongsTo("App\Categories","category_id");
    }
    public function comments()
    {
        return $this->hasMany("App\Comments","article_id");
    }
}
