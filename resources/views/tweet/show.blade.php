@extends('layouts.default')

@section('page-title')
    ツイート詳細
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" style="color: #fff">
            <h3>ツイート本文</h3>
            <p>{{ $tweet->body }}</p>
            <h3>投稿日時</h3>
            <p>{{ $tweet->created_at }}</p>
        </div>
    </div>
    @if(Auth::check())
        <a href="{{ route('tweets.edit', ['id' => $tweet->id]) }}" class="btn btn-primary glyphicon glyphicon-repeat"> 更新</a>
        <form action="{{ route('tweets.destroy', ['id' => $tweet->id]) }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"> 削除</button>
        </form>
    @endif
@endsection
