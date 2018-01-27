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
    public function store(){}


    //作った文章を編集
    public function edit(){
        return view("post/edit");
    }
    //文章を更新し、投稿
    public function update(){}


    //文章を削除
    public function delete(){}



}
