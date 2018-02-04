<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //プロフィール
    public function setting(){
        return view('user.setting');

    }
    //プロフィルを編集し、保存
    public function settingStore(){

    }
}
