@extends('layouts.app')

@section('content')
    @include('tweet.tweetCreate')
    @foreach($tweets as $tweet)
        <div class="col-4" style="margin: auto">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-tilte">{{$tweet->user->name}}</h5>
                </div>
                <hr class="separator">
                <div class="container">
                    {{$tweet->content}}
                </div>
                <span class="card-text" style="text-align: end; padding-right: 5px"><small class="text-muted">{{ $tweet->created_at }}</small></span>
            </div>
        </div>
    @endforeach
@endsection
