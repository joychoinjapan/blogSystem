<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //プロフィール
    public function setting(){
        $user=Auth::user();
        return view('user.setting',compact('user'));

    }
    //プロフィルを編集し、保存
    public function settingStore(Request $request){

        //validation
        $this->validate(\request(),[
            'name'=>'required|min:3',
        ]);

        //logic
        $name=\request('name');
        $user=Auth::user();
        if($name!=$user->name){
            if(User::where('name',$name)->count()>0){
                return back()->withErrors('このユーザー名はすでに登録されています。新しい名前をお作りください');
            }
            $user->name=$name;
        }

        if($request->file('avatar')){
            $path=$request->file('avatar')->storePublicly($user->id);
            $user->avatar=asset('/storage').'/'.$path;
        }

        $user->save();

        //draw
        return back();


    }
}
