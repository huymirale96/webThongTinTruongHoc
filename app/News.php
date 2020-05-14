<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use App\NewsType;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- This is required
class News extends Model
{
    //
    use SoftDeletes;
    protected $table = "news";
    protected $guard = [];
    public $timestamps = true;
    protected $fillable = [
     'desciption',
     'content',
     'datecreatenew',
     'account_id',
     'newstype_id',
     'urlimage',
    ];
  //  protected $hidden = ['updated_at'];
    public function newsType()
    {
        return $this->belongsTo('App\NewsType','newstype_id','id');
    }
    public function account()
    {
        return $this->belongsTo('App\Account','account_id','id');
    }

}
