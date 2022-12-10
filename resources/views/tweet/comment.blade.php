@section('content')
    @foreach($comments as $comment)
        <div class="col-4" style="margin: auto">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-tilte"><a href="{{ route('user.profile', ['user' => $comment->user ]) }}" style="text-decoration: none; color: black">{{$comment->user->name}}</a></h5>
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
                </div>
                <hr class="separator">
                <div class="container">
                    {{$comment->content}}
                </div>
                <span class="card-text" style="text-align: end; padding-right: 5px"><small class="text-muted">{{ $comment->created_at }}</small></span>
            </div>
        </div>
    @endforeach
@endsection