<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class DocumentsType extends Model
{
    use SoftDeletes;
    protected $table = "documents_type";
    protected $guard = [];
    public $timestamps = true;
    protected $fillable = [
     'name_type_document',
    ];
  //  protected $hidden = ['updated_at'];
    public function newsType()
    {
        return $this->hasMany('App\Documents','documentstype','id');
    }
    public function documents()
    {
      return $this->hasMany('App\Documents','documentstype_id','id');
    }
}
