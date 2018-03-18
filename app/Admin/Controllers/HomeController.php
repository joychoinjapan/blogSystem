<?php
/**
 * Created by PhpStorm.
 * User: baobaochu
 * Date: 2018/3/16
 * Time: 16:11
 */

namespace App\Admin\Controllers;



class HomeController extends Controller
{

    //homepage
    public function index(){
        return view('admin.home.index');

    }



}