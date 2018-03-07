<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;


//テーブル→posts
class Post extends Model
{
    //
    use Searchable;

    //定义索引里面的type
    public function searchableAs()
    {
        return "post";
    }

    //定义有哪些字段需要搜索
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content

        ];
    }

    protected $fillable = ['title', 'content', 'user_id'];

    //ユーザー表と関係付ける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //ユーザー表と関係付けるその２
    //：ユーザーモデル、ポスト表の外部キー,ユーザー表の主キー
//    public function user(){
//        return $this->belongsTo('App\user','user_id','id');
//    }

    //comment表と関係付ける
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    //このユーザーは「いいね」のモデルを保有しているのか
    public function zan($user_id)
    {
        return $this->hasOne('App\Zan')->where('user_id', $user_id);
    }

    //postごとに全てのzanを取得する
    public function zans()
    {
        return $this->hasMany('App\Zan');

    }

    public function scopeAuthorBy(Builder $query, $user_id)
    {
        return $query->where('user_id', $user_id);

    }

    public function postTopics()
    {
        return $this->hasMany(\App\PostTopic::class, 'post_id', 'id');
    }

    public function scopeTopicNotBy(Builder $query, $topic_id)
    {
        return $query->doesntHave('postTopic', 'and', function ($q) use ($topic_id) {
            $q->where('topic_id', $topic_id);
        });
    }


}