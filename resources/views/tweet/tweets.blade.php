@extends('layouts.app')

@section('content')

    @foreach($tweets as $tweet)
        <div class="col-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-tilte">{{$tweet->user->name}}</h5>
                </div>
                <hr class="separator"></hr>
                <div class="container">
                    {{$tweet->content}}
                </div>
                <span class="card-text">small.</span>
            </div>
        </div>
    @endforeach
@endsection
