@extends('layouts.default')

@section('page-title')
    ツイート一覧
@endsection
@section('content')
        <div class="col-md-2">
            @if( Auth::check() )
            <p>
                <img src="/storage/avatar/{{ Auth::user()->userProfile->avater_filename }}" class="img-circle" width="165" height="170"/>
            </p>
            <p style="font-size: 20px; color: #fff"><i class="fab fa-github"></i>
                {{ Auth::user()->name }}
            </p>
            <p style="font-size: 20px; color: #fff" class="glyphicon glyphicon-comment">
            </p>
            <p style="font-size: 20px; color: #fff">
                {{ Auth::user()->userProfile->introduction }}
            </p>
            <p>
                <a class="btn btn-info glyphicon glyphicon-info-sign" href="{{ route('user_profile.show', ['id' => Auth::user()->id]) }}" style="font-size: 15px">
                    プロフィール詳細
                </a>
            </p>
            <a class="btn btn-primary glyphicon glyphicon-send" href="{{ route('tweets.create') }}"> ツイート新規投稿</a>
            @endif
        </div>
        <div class="col-md-10">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <table class="table">
                <tbody>
                    @foreach($tweets as $tweet)
                    <tr>
                        <td>
                            <ul class="list-unstyled">
                                <li style="color: #fff">
                                    <a class="glyphicon glyphicon-user" href="{{ route('user_profile.show', ['id' => $tweet->user->id]) }}"> {{ $tweet->user->name }}</a>: {{ $tweet->body }}
                                 </li>
                                @if(count($tweet->hashTags) > 0)
                                <li>
                                    <ul class="list-inline">
                                        @foreach($tweet->hashTags as $hash_tag)
                                            <li>
                                                <a href="{{ route('hash_tags.tweets', ['id' => $hash_tag->id]) }}">
                                                    <span class="label label-info">
                                                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ $hash_tag->name }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td class="text-right"><a class="btn btn-primary glyphicon glyphicon-info-sign" href="{{ route('tweets.show', ['id' => $tweet->id]) }}">:詳細</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
