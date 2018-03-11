<?php

namespace App\Providers;

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Topic;
use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //param1:dashboard param2:function($view)
        View::composer('layout.sidebar',function ($view){
            //App/Topicのモデルを全部探し出す。
            $topics=Topic::all();
            //topicsをviewに渡す　key:topics value:$topics
            //果只需要传递特定数据而非一个臃肿的数组到视图文件，可以使用 with 辅助函数，示例如下：
           $view->with('topics',$topics);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
