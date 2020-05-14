<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduces extends Model
{
    //
    protected $table = "introduce";
    protected $guard = [];
    public $timestamps = true;
    public function Account(){
        return $this->belongsTo('App\Account','account_id','id');
    }
}
