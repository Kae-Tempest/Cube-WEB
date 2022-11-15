@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col"></div>
        <div class="col-6">
            @include('tweet.tweetCreate')
        </div>
        <div class="col"></div>
    </div>
@endsection
