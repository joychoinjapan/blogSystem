<?php

namespace App;

use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminUser extends Authenticatable
{
    //
    protected $rememberTokenName='remember_token';

    protected $fillable=['name','password'];

}
