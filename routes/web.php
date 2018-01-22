<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/**
 * 文章モジュール
 */
// 文章リストを表示
Route::get('posts','PostController@index');

//文章を作成 1.作成画面
Route::get('/posts/create','PostController@create');

//文章を作成 2. 投稿
Route::post('/posts','PostController@store');

//文章を削除
Route::get('/posts/delete','PostController@delete');

//文章の詳細を表示
Route::get('/posts/{post}','PostController@show');


//作った文章を編集 1.画面
Route::get('/posts/{post}/edit','PostController@edit');

//文章を作成 2. 更新を投稿
Route::put('/posts/{post}','PostController@update');