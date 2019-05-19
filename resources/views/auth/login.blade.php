@extends('layouts.default')

@section('page-title')
    ログイン
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('auth.postLogin') }}">
        {!! csrf_field() !!}

        <div style="color: #00bfff">
            メールアドレス
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div style="color: #00bfff">
            パスワード
            <input type="password" name="password" id="password">
        </div>

        <div class="btn-group" data-toggle="buttons">
        	<label class="btn btn-primary active">
            <input type="checkbox" autocomplete="off" name="remember"> Remember Me
            </label>
        </div>

        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
@endsection
