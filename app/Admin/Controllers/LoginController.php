<?php
/**
 * Created by PhpStorm.
 * User: baobaochu
 * Date: 2018/3/16
 * Time: 16:11
 */

namespace App\Admin\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{

    //login page
    public function index(){
        return view('admin.login.index');

    }

    //login activity
    public function login(){

        //validate
        $this->validate(request(),[
            'name'=>'required|min:2',
            'password'=>'required|min:5|max:10',
        ]);

        //logic
        $user=request(['name','password']);
        if(Auth::guard("admin")->attempt($user)){
            return redirect('/admin/home');
        }

        return Redirect::back()->withErrors("用户名密码不匹配");
    }



    //logout
    public function logout(){
        Auth::guard("admin")->logout();
        return \redirect('/admin/login');

    }


}