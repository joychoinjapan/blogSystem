<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

/**
 * Class PostController
 * @package App\Http\Controllers
 * 文章モジュール
 */
class PostController extends Controller
{
    // 文章リストを表示
    public function index(){
        $posts=Post::orderBy('created_at','desc')->paginate(6);

        return view("post/index",compact('posts'));
    }
    // 文章の詳細を表示
    public function show(Post $post){
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

        //モデルをデータベースに保存する　方法2
        $params=['title'=>\request('title'),'content'=>strip_tags(\request('content'))];
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
        //validation
        $this->validate(request(),[
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|max:1000|min:10',
        ]);

        //logic
        $post->title=\request('title');
        $post->content=strip_tags(\request('content'));
        $post->save();

        //draw
        $url=asset('/posts');
        return redirect("$url/{$post->id}");

    }


    //文章を削除
    public function delete(){}



}
