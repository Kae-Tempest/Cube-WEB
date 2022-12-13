@extends('layouts.app')

@section('content')
@include('tweet.tweetCreate')
@foreach($tweets as $tweet)
    <div class="card w-50 mt-4" style="margin: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-tilte"><a href="{{ route('user.profile', ['user' => $tweet->user ]) }}"
                            style="text-decoration: none; color: black">{{$tweet->user->name}} {{$tweet->id}}</a></h5>
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
        <div class="card-footer d-flex justify-content-between">
            <button data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-primary" id='openModal'
                style="margin: 5px 0 5px 5px"><i class="bi bi-chat-dots"></i></button>
            <!-- Modal -->
            <div class="modal fade modal-lg" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabel">New Comment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="wrapper">
                                <form id="paper" method="POST"
                                    action="{{route('comment.store', ['post_id' => $tweet->id])}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <textarea placeholder="Enter something funny." id="text2" name="CommentContent"
                                        rows="4"
                                        style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px;"
                                        maxlength="250"></textarea>
                                    <br>
                                    <span id="remaning2" style="color: black">250 {{ $tweet }}</span>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Tweet</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <span class="card-text" style="padding-right: 5px"><small
                    class="text-muted text-right">{{$tweet->created_at}}</small></span>
        </div>
    </div>
    @foreach($comments as $comment)
    @if($comment->post_id === $tweet->id)
    <div class="card w-50" style="margin: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-tilte"><a href=""
                            style="text-decoration: none; color: black">{{$comment->user->name}}
                            {{$comment->post_id}}</a></h5>
                </div>
                @if($comment->user->name === Auth::user()->name)
                <div class="col-1">
                    <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
                @endif
            </div>
            <hr class="separator">
            <div class="container">
                {{$comment->content}}
            </div>
        </div>
        <div class="card-footer">
            <span class="card-text" style="text-align: right; padding-right: 5px"><small
                    class="text-muted">{{$comment->created_at}}</small></span>
        </div>
    </div>
    @endif
@endforeach
@endforeach
@endsection