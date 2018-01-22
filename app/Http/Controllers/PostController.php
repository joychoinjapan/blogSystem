<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 * 文章モジュール
 */
class PostController extends Controller
{
    // 文章リストを表示
    public function index(){
        $posts=[
            ['title'=>'this is title1'],
            ['title'=>'this is title2'],
            ['title'=>'this is title3'],
            ['title'=>'this is title4'],
            ];

        return view("post/index",compact('posts'));
    }
    // 文章の詳細を表示
    public function show(){
        return view("post/show",['title'=>'this is title','isShow'=>false]);

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
