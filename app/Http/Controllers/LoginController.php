<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //ログイントップページ
    public function index(){
        return view('login.index');
    }

    //ログイン
    public function login(){


    }

    //ログアウト
    public function logout(){

    }
}
