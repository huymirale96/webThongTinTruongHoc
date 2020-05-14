<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- This is required
use Illuminate\Auth\Authenticatable;   //them vao auth
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; //them vao auth
class Account extends Model implements AuthenticatableContract
{
    use Authenticatable;  //them vao auth
    use SoftDeletes;
    protected $table = "accounts";
    public $timestamps = true;
    protected $fillable = [
        'fullname',
        'email',
        'phone',
    ];
    protected $guard = ['username','password'];
}
