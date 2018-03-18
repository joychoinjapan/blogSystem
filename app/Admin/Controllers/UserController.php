<?php
/**
 * Created by PhpStorm.
 * User: baobaochu
 * Date: 2018/3/18
 * Time: 09:53
 */
namespace App\Admin\Controllers;


class UserController extends Controller
{
    //user list
    public function index(){
        return view('/admin/user/index');
    }

    // create user activity
    public function create(){
        return view('/admin/user/add');
    }

    //store users
    public function store(){

    }
}