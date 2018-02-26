<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Zan;
/**
 * Class PostController
 * @package App\Http\Controllers
 * 文章モジュール
 */
class PostController extends Controller
{


    // 文章リストを表示
    public function index(){
        //新たしい文章上に並ぶ,$postsは幾つかのオブジェクトを格納する配列です
        $posts=Post::orderBy('created_at','desc')->withCount(["comments",'zans'])->paginate(6);
        return view("post/index",compact('posts'));

    }


    // 文章の詳細を表示
    public function show(Post $post){
        $post->load('comments');
        return view("post/show",compact('post'));

    }
    //文章を作成
    public function create(){
        return view("post/create");
    }

    //作った文章を保存、投稿
    public function store(){



        //validate
        $this->validate(request(),[
            //required:このパラメーターは必要です。string:必要なデータ型max/min：最大・最小文字数
            'content'=>'required|string|max:1000|min:10',
            'title'=>'required|string|max:100|min:5',
            //errorsを表示,post/create.bladeへ行く
        ]);

        //dd(\Request::all());
        //dd(request()->all());

        //モデルをデータベースに保存する　方法1
//        $post=new Post();
//        $post->title=\request('title');
//        $post->content=\request('content');
//        $post->save();

        //user_idを取得
        $user_id=Auth::id();
        //モデルをデータベースに保存する　方法2
        $params=['title'=>request('title'),'content'=>strip_tags(request('content')),'user_id'=>$user_id];
        $post=Post::create($params);
        return redirect("/posts");

    }
    public function imageUpload(Request $request){

        $path=$request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
        //dd(\request()->all());

    }


    //作った文章を編集
    public function edit(Post $post){
        return view("post/edit",compact('post'));
    }
    //文章を更新し、投稿
    public function update(Post $post){
        $this->authorize('update',$post);
        //validation
        $this->validate(request(),[
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|max:1000|min:10',
        ]);

        //logic
        $post->title=\request('title');
        //注意：これは問題点があります：文章のhtmlタグは保存されなくなります！！！
        $post->content=strip_tags(\request('content'));
        $post->save();

        //draw
        $url=asset('/posts');
        return redirect("$url/{$post->id}");

    }


    //文章を削除
    public function delete(Post $post){
        $this->authorize('delete',$post);

        //TODO:ユーザーの認証
        $post->delete();
        $url=asset('/posts');
        return redirect("$url");
    }

    public function comment(Post $post){

        $this->validate(request(),[
            'content'=>'required|min:3',
        ]);

        $comment=new Comment();
        $comment->user_id=Auth::id();
        $comment->content=\request('content');
        $post->comments()->save($comment);

        return back();

    }


    //いいねの機能
    public function zan(Post $post){

        $param=[
            'user_id'=>Auth::id(),
            'post_id'=>$post->id
        ];
        //先查找是否有这条数据，如果没有我就创建

        Zan::firstOrCreate($param);
        return back();

    }

    //いいねを取り消す
    public function unzan(Post $post){

        $post->zan(Auth::id())->delete();
        return back();

    }


    public function search(){

        //validation
        $this->validate(\request(),[
            'query'=>'required'

        ]);

        //logic
        $query=\request('query');
        $posts=Post::search($query)->paginate(2);

        //draw
        return view("post/search",compact('posts','query'));


    }
    


}
