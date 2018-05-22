<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [

        'name', 'content' ,'article_id'
    ];

    public function articles()
    {
        return $this->belongsTo("App\Articles","article_id");
    }
}
