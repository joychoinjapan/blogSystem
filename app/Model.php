<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

//テーブル→posts
class Model extends BaseModel
{
    //
    protected $guarded;//注入できないフィルド

    //注入できるフィルド
}