@extends('layouts.default')

@section('page-title')
    ツイート新規投稿
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tweets.store') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff">ツイート本文</label>
                    <div class="col-xs-10">
                        <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ old('body') }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff">ハッシュタグ</label>
                    <div class="col-xs-8">
                        <input type="text" name="hash_tags" class="form-control" placeholder="ハッシュタグを入力してください。" value="{{ old('hash_tags') }}"/>
                        <p class="help-block">複数のハッシュタグをつける場合は、半角スペースで区切ってください。</p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary glyphicon glyphicon-send"> 投稿する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
