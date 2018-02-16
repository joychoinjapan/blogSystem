<ul class="nav navbar-nav navbar-left">
    <li>
        <a class="blog-nav-item " href="{{asset('/posts')}}">首页</a>
    </li>
    <li>
        <a class="blog-nav-item" href="{{asset('/posts/create')}}">写文章</a>
    </li>
    <li>
        <a class="blog-nav-item" href="{{asset('/notices')}}">通知</a>
    </li>
    <li>
        <input name="query" type="text" value="" class="form-control" style="margin-top:10px" placeholder="搜索词">
    </li>
    <li>
        <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
    </li>
</ul>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <div>
            @if(\Illuminate\Support\Facades\Auth::check()==false)
            <img src="" alt="" class="img-rounded" style="border-radius:500px; height: 30px">
            <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    ゲスト
            @else
            <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 30px">
            <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{\Illuminate\Support\Facades\Auth::user()->name}}
             @endif
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/user/5">我的主页</a></li>
                <li><a href="{{asset('/user/me/setting')}}">个人设置</a></li>
                <li><a href="{{asset('/logout')}}">登出</a></li>
            </ul>
        </div>
    </li>
</ul>