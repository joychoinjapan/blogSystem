<?php

namespace App;

use App\Model;

//テーブル→posts
class Post extends Model
{
    //

    protected $fillable=['title','content'];
}
