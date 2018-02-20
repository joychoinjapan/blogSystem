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

    //このユーザーは「いいね」のモデルを保有しているのか
    public function zan($user_id){
        return $this->hasOne('App\Zan')->where('user_id',$user_id) ;
    }

    //postごとに全てのzanを取得する
    public function zans(){
        return $this->hasMany('App\Zan');

    }

}
