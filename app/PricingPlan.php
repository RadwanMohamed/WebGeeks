<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{

    protected $fillable = [
        //``title`, ``content, `name`, `user_id`
        'type', 'price' ,'currency','time','properties','user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
