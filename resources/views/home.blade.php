<!DOCTYPE html>
<html>
<head>
	<title>簡易掲示板(β版)</title>
	<meta charset="utf-8">
</head>
<body>
こんにちは！
@if(Auth::check())
	{{ \Auth::user()->name }}さん<br/>
	<a href="{{ route('auth.getLogout') }}">ログアウト</a>
@else
	ゲストさん<br/>
	<a href="{{ route('auth.getLogin') }}">ログイン</a>
	<a href="{{ route('auth.getRegister') }}">会員登録</a>
@endif
</body>
</html>
