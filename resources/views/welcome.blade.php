@extends('layouts.app')

@section('content')
    <div class="row text-center">
            @include('tweet.tweetCreate')
            @include('tweet.tweetList')
    </div>
@endsection
