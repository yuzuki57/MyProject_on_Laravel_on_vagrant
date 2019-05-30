@extends('layouts.default')

@section('page-title')
    ユーザプロフィール
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" style="color: #fff">
            <h3>名前</h3>
            <p>{{ $user->name }}</p>
            <h3>紹介文</h3>
            <p>{{ optional($user->userProfile)->introduction }}</p>
            <h3>誕生日</h3>
            <p>{{ optional($user->userProfile)->birthday }}</p>
            <h4>ユーザーアイコン</h4>
            <p><img src="/storage/avatar/{{ ($user->userProfile)->avater_filename }}" class="img-rounded" /></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user_profile.edit', ['id' => $user->id]) }}" class="btn btn-primary glyphicon glyphicon-edit"> 編集</a>
        </div>
    </div>
@stop
