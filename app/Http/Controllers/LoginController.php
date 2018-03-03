<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    //ログイントップページ
    public function index(){
        if(Auth::check()){
        return redirect(asset('/posts'));
        }
        return view('login.index');
    }

    //ログイン
    public function login(){
        //验证
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required|min:5|max:10',
            'is_remember'=>'integer'
        ]);
        //逻辑
        $user=request(['email','password']);
        $is_remember=boolval(request(['is_remember']));


        //認証されたら文章一覧へ
        if(Auth::attempt($user,$is_remember)){
            //dd(Auth::id());
            return redirect(asset('/posts'));
        }

        //渲染
        return Redirect::back()->withErrors('ログインができませんでした。ご確認の上もう一度お試しください。');


    }

    //ログアウト
    public function logout(){
        Auth::logout();
        $url=asset('/login');
        return redirect($url);

    }
}
