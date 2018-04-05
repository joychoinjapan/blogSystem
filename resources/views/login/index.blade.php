<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>登陆</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet">

    <link href="{{asset('/css/blog.css')}}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" method="POST" action="{{asset('/login')}}">
        {{csrf_field()}}
        <h2 class="form-signIn-heading">メンバー登録をしている方</h2>
        <label for="inputEmail" class="sr-only">メール</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="メール" required autofocus>
        <label for="inputPassword" class="sr-only">パスワード</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="パスワード" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="is_remember">覚える
            </label>
        </div>
        @include('layout.error')
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        <a href="{{asset('/register')}}" class="btn btn-lg btn-primary btn-block" type="submit">アカンウト登録>></a>
    </form>

</div> <!-- /container -->

</body>
</html>
