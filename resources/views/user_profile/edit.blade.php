@extends('layouts.default')

@section('page-title')
    ユーザプロフィール編集
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

            <form action="{{ route('user_profile.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff"><i class="fab fa-github"></i> 紹介文</label>
                    <div class="col-xs-10">
                        <input name="introduction" type="text" class="form-control" value="{{ old('introduction', $user->userProfile->introduction) }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff"><i class="fas fa-birthday-cake"></i> 誕生日</label>
                    <div class="col-xs-10">
                        <input name="birthday" type="date" class="form-control" value="{{ old('birthday', $user->userProfile->birthday) }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    @if ($user->userProfile->avater_filename)
                        <p>
                            <img src="/storage/avatar/{{ $user->userProfile->avater_filename }}" class="img-rounded" />
                        </p>
                    @endif
                    <label class="col-xs-2 col-form-label glyphicon glyphicon-picture" style="color: #fff"> 画像のアップロード</label>
                    <div class="col-xs-10">
                        <input name="avater_filename" type="file" class="form-control" value="{{ old('avater_filename', $user->userProfile->avater_filename) }}"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">編集を確定する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
