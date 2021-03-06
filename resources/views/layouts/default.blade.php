<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風マイアプリ</title>
    <link rel="shortcut icon" href="{{{ asset('img/G-icon.png') }}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <style type="text/css">.jumbotron { background:url({{{ asset('img/maxresdefault2.jpg') }}}) center no-repeat; background-size: cover; background-attachment: fixed;}
    </style>
</head>
<body class="jumbotron">

    <div class="container">
        <div class="page-header" style="color: #008899">
            <h1><img src="{{{ asset('img/smile2.jpg') }}}" class="img-circle" alt="アイコン画像" width="160" height="125">Twitter風マイアプリ<small>by@sakioka</small></h1>
            <h2><i class="fas fa-cog fa-spin"></i>@yield('page-title')</h2>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{ route('tweets.index') }}" class="navbar-brand glyphicon glyphicon-home">:マイアプリ-トップ</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('auth.getLogout') }}" class="glyphicon glyphicon-log-out">:ログアウト</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('auth.getRegister') }}" class="glyphicon glyphicon-user">:ユーザ新規登録</a>
                        </li>
                        <li>
                            <a href="{{ route('auth.getLogin') }}" class="glyphicon glyphicon-log-in">:ログイン</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        
        <div class="row">
            @yield('content')
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
