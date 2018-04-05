<?php
/**
 * Created by PhpStorm.
 * User: baobaochu
 * Date: 2018/3/18
 * Time: 09:53
 */
namespace App\Admin\Controllers;
use \App\AdminUser;


class UserController extends Controller
{
    //user list
    public function index(){
        $users=AdminUser::paginate(10);
        return view('/admin/user/index',compact('users'));
    }

    // create user activity
    public function create(){
        return view('/admin/user/add');
    }

    //store users
    public function store(){
        //validate
        $this->validate(request(),[
           'name'=>'required|min:3',
            'password'=>'required'
        ]);

        //logic
        $name=request('name');
        $password=bcrypt(request('password'));
        AdminUser::create(compact('name','password'));


        //view

        return redirect("/admin/users");
    }
}