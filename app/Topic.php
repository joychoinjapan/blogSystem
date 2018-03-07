<?php

namespace App;
use App\Model;

class Topic extends Model
{
    //Topicに属する文章を取得
    public function posts(){
        return $this->belongsToMany(Post::class,'post_topics','topic_id','post_id');
    }

    //Topic一つに属する文章の数,withCount用
    public function postTopics(){
        return $this->hasMany(PostTopic::class,'topic_id','id');
    }
}
