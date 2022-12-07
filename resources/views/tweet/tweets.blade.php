@extends('layouts.app')

@section('content')
    @include('tweet.tweetCreate')
    @foreach($tweets as $tweet)
        <div class="col-4" style="margin: auto">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-tilte">{{$tweet->user->name}}</h5>
                        </div>
                        @if($tweet->user->name === Auth::user()->name)
                        <div class="col-1">
                            <form action="{{ route('tweets.destroy', ['tweet' => $tweet]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                        @endif
                    </div>
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
