<?php
/**
 * Created by PhpStorm.
 * User: baobaochu
 * Date: 2018/3/15
 * Time: 22:33
 */

/**
 * backend
 */

Route::group(['prefix'=>'admin'],function(){

    //Login page
    Route::get('/login','\App\Admin\Controllers\LoginController@index');

    //login activity
    Route::post('/login','\App\Admin\Controllers\LoginController@login');

    //logout
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware'=>'auth:admin'],function (){
        //backend homepage need login
        Route::get('/home','\App\Admin\Controllers\HomeController@index');

        //management module
        //management users list
        Route::get('/users','\App\Admin\Controllers\UserController@index');

        //create users
        Route::get('/create','\App\Admin\Controllers\UserController@create');
        //store users
        Route::get('/store','\App\Admin\Controllers\UserController@store');



    });


});