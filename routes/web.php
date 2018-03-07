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

Route::get('/',function (){
    return redirect("/login");
});

/**
 * 検索
 */

Route::group(['middleware'=>'auth:web'],function (){
    Route::get('/posts/search','PostController@search');
});

/**
 * 文章モジュール
 */

Route::group(['middleware'=>'auth:web'],function (){
    // 文章リストを表示
    Route::get('/posts','PostController@index');

//文章を作成 1.作成画面
    Route::get('/posts/create','PostController@create');

//文章を作成 2. 投稿
    Route::post('/posts','PostController@store');

    Route::post('/posts/image/upload','PostController@imageUpload');

//文章を削除
    Route::get('/posts/{post}/delete','PostController@delete');

//文章の詳細を表示
    Route::get('/posts/{post}','PostController@show');


//作った文章を編集 1.画面
    Route::get('/posts/{post}/edit','PostController@edit');

//文章を作成 2. 更新を投稿
    Route::put('/posts/{post}','PostController@update');
});



/**
 * アカンウト作成モジュール
 */

Route::group(['middleware'=>'auth:web'],function () {
//プロフィール
    Route::get('/user/me/setting', 'UserController@setting');
//プロフィルを編集し、保存
    Route::post('/user/me/setting', 'UserController@settingStore');
});

//アカンウト作成トップページ
Route::get('/register','RegisterController@index');
//アカウント作成
Route::post('/register','RegisterController@register');

//ログイントップページ routeをloginと名付ける。
Route::get('/login','LoginController@index')->name('login');
//ログイン
Route::post('/login','LoginController@login');
//ログアウト
Route::get('/logout','LoginController@logout');


/**
 * コメントモジュール
 */
Route::group(['middleware'=>'auth:web'],function (){
    //コメントを提出
    Route::post('/posts/{post}/comment','PostController@comment');
});

/**
 * zanモジュール
 */

Route::group(['middleware'=>'auth:web'],function (){
    //いいねを押す
    Route::get('/posts/{post}/zan','PostController@zan');
    Route::get('/posts/{post}/unzan','PostController@unzan');
});

/**
 * プロフィール
 */

Route::group(['middleware'=>'auth:web'],function (){
    Route::get('/user/{user}','UserController@show');
    Route::post('/user/{user}/fan','UserController@fan');
    Route::post('/user/{user}/unfan','UserController@unfan');
});


/**
 * Topic
 */

Route::group(['middleware'=>'auth:web'],function (){
    Route::get('/topic/{topic}','TopicController@show');
    Route::post('/topic/{topic}/submit','TopicController@submit');

});

