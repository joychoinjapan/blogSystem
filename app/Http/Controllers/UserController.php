<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //プロフィールを設定
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

            $files = Storage::allfiles($user->id);
            Storage::delete($files);
            $path=$request->file('avatar')->storePublicly($user->id);
            $user->avatar=asset('/storage').'/'.$path;

        }

        $user->save();

        //draw
        return back();


    }

    //プロフィール
    public function show(User $user){
        //プロフィールの詳細 作品の数お気に入りの数 視聴者の数
        $user=User::withCount(['stars','fans','posts'])->find($user->id);

        //写真


        //名前

        //ユーザー個人の文章のリスト、一番新しい文章10本
        $posts=$user->posts()->orderBy('created_at','desc')->take(10)->get();

        //（star）お気に入りに登録されたユーザー（このユーザーの名前、お気に入り、視聴者、文章の数）
        $stars=$user->stars;

        //获取stars模型中的所有star_id,然后到User表中查找是否和id一致，最后得出用户关注的博主的模型。
        $susers=User::whereIn('id',$stars->pluck('star_id'))->withCount(['stars','fans','posts'])->get();
        //（fan）視聴者の名前、お気に入り、視聴者、文章の数
        $fans=$user->fans;
        //获取fans模型中的所有fan＿id，然后到User表中查找是否和id一致，最后得出关注用户的粉丝的模型。
        $fusers=User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','posts'])->get();

        return view('user/show',compact('user','posts','susers','fusers'));
    }
    //お気にりを登録
    public function fan(User $user){
        $me=Auth::user();
        $me->doFan($user->id);
        return [
            "error"=>0,
            "msg"=>""
        ];

    }

    //お気に入りを取り消し

    public function unfan(User $user){
        $me=Auth::user();
        $me->doUnFan($user->id);
        return [
            "error"=>0,
            "msg"=>""
        ];
    }
}
