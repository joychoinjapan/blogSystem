<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTopic;
use Illuminate\Http\Request;
use App\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    //Topicの詳細ページ
    public function show(Topic $topic)
    {

        //文章の数
        $topic=Topic::withCount('postTopics')->find($topic->id);


        //文章のリスト、時間の古い順に、10つ
        $posts=$topic->posts()->orderBy('created_at','desc')->take(10)->get();

        //ユーザーの文章で、Topicに投稿済みでないもの
        $myposts=Post::authorBy(Auth::id())->scopeTopicNotBy($topic->id)->get();



        return view('topic/show',compact('topic','posts','myposts'));
    }

    public function submit(Topic $topic)
    {
        $this->validate(\request(),[
            'post_ids'=>'required|array'
        ]);
        $post_ids=request('post_ids');
        $topic_id=$topic->id;
        foreach ($post_ids as $post_id){
            PostTopic::firstOrCreatd(compact('topic_id','post_id'));
        }
        return back();
    }
}
