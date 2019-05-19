@extends('layouts.default')

@section('page-title')
    ユーザ新規登録
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

    <form method="POST" action="{{ route('auth.postRegister') }}">
        {!! csrf_field() !!}

        <div style="color: #00bfff">
            名前
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div style="color: #00bfff">
            メールアドレス
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div style="color: #00bfff">
            パスワード
            <input type="password" name="password">
        </div>

        <div style="color: #00bfff">
            パスワード再入力
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit">登録</button>
        </div>
    </form>
@endsection
