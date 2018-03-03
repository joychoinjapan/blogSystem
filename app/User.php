<?php

namespace App;

use App\Model;
use App\Post;
use App\Fan;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    use Notifiable;
    //
    protected $fillable=['name','email','password','avatar'];
    protected $hidden = [
        'password', 'remember_token',
    ];



    //ユーザーの文章リストを取得

    public function posts(){

        return $this->hasMany(Post::class,'user_id','id');
    }


    //ユーザーの視聴者さんたちを取得
    public function fans(){
        return $this->hasMany(Fan::class,'star_id','id');
    }

    //ユーザーのお気にりを取得
    public function stars(){
        return $this->hasMany(Fan::class,'fan_id','id');
    }

    //お気にりを登録
    public function doFan($uid){
        $fan=new Fan();
        $fan->star_id=$uid;
        return $this->stars()->save($fan);
    }

    //お気にりを取り消し
    public function doUnFan($uid){
        $fan=new Fan();
        $fan->star_id=$uid;
        return $this->stars()->delete($fan);
    }


    //ユーザーはuidに視聴されたのか？
    public function hasFan($uid){
        return $this->fans()->where('fan_id',$uid)->count();

    }

    //ユーザーはuidをお気にり登録したか
    public function hasStar($uid){
        return $this->stars()->where('star_id',$uid)->count();
    }
}
