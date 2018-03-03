<?php

namespace App;

use App\Model;
use App\User;

class Fan extends Model
{

    protected $fillable=['fan_id','star_id'];



    //モデルFanを用いて、ユーザーのお気に入り(star)を取得
    //关注用户//首先要获得该用户作为粉丝的时候模型


    public function fuser(){
        //将Fan表的fan_id与用户表的id建立关系。
        //Fan(fan_id)-----User(id)
        return $this->hasOne(User::class,'id','fan_id');
    }




    //モデルFanを用いて、ユーザーの視聴者さん(fans)を取得
    //粉丝用户//首先要获得该用户作为被关注者/太太/博主的时候的模型
    public function suser(){
        return $this->hasOne(User::class,'id','star_id');

    }






}
