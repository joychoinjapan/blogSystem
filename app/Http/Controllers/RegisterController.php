<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    //アカウント作成用トップページ
    public function index(){
        return view('register.index');
    }



    //アカウント作成
    public function register(){
        //validation
        $this->validate(request(),[
            'name'=>'required|min:3|max:10|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:5|max:10|confirmed'
        ]);

        //logic
        $name=request('name');
        $email=request('email');
        //暗号化
        $password=bcrypt(request('password'));
        $user=User::create(compact('name','email','password'));

        //draw
        $url=asset('/login');
        return redirect($url);
    }
}
