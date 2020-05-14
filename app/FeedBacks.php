<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBacks extends Model
{
    //
    protected $table = "feedbacks";
    protected $guard = [];
    public $timestamps = true;

    public function account()
    {
        return $this->belongsTo('App\Account','account_id','id');
    }
}
