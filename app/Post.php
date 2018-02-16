<?php

namespace App;

use App\Model;

//テーブル→posts
class Post extends Model
{
    //

    protected $fillable=['title','content','user_id'];

    //ユーザー表と関係付ける
    public function user(){
        return $this->belongsTo('App\User');
    }

    //ユーザー表と関係付けるその２
    //：ユーザーモデル、ポスト表の外部キー,ユーザー表の主キー
//    public function user(){
//        return $this->belongsTo('App\user','user_id','id');
//    }

    //comment表と関係付ける
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

}
