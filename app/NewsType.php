<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- This is required

class NewsType extends Model
{
    //
    use SoftDeletes;
    protected $table = "newstypes";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'nametype',
    ];

    public function news()
    {
        return $this->hasMany('App\News','newsType_id','id');
    }
}
