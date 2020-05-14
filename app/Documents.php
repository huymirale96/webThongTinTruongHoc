<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Documents extends Model
{
    //
    use SoftDeletes;
    protected $table = "documents";
    protected $guard = [];
    public $timestamps = true;
    protected $fillable = [
     'name_documents',
    ];
    public function documentsType()
    {
        return $this->belongsTo('App\DocumentsType','documentstype_id','id');
    }
    public function account()
    {
        return $this->belongsTo('App\Account','account_id','id');
    }
}
