<form action="/posts/search" method="GET">
<ul class="nav navbar-nav navbar-left">
    <li>
        <a class="blog-nav-item " href="{{asset('/posts')}}">トップ</a>
    </li>
    <li>
        <a class="blog-nav-item" href="{{asset('/posts/create')}}">文章を書く</a>
    </li>
    <li>
        <a class="blog-nav-item" href="{{asset('/notices')}}">メッセージ</a>
    </li>
    <li>
        <input name="query" type="text" value="@if(!empty($query)){{$query}}@endif" class="form-control" style="margin-top:10px" placeholder="検索">
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
                <li><a href="{{asset('/user')}}/{{\Illuminate\Support\Facades\Auth::id()}}">私のホームページ</a></li>
                <li><a href="{{asset('/user/me/setting')}}">プロフィール設定</a></li>
                <li><a href="{{asset('/logout')}}">ログアウト</a></li>
            </ul>
        </div>
    </li>
</ul>
</form>