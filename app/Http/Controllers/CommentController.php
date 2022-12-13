<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use App\Models\Tweet;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        $comments = Comment::with('user')->orderBy('created_at', 'DESC')->get();
        return view('tweet/tweets', [
            'tweets' => $tweets,
            'comments' => $comments,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'CommentContent' => ['required', 'min:1', 'max:250'],
            'user_id' => ['exists:users,id'],
            'tweet_id' => ['exists:tweet,id']
        ]);
        Comment::create([
            'content' => $request->CommentContent,
            'user_id' => auth()->user()->id,
            'tweet_id' => $request->tweet_id
        ]);
        return Redirect::route('tweet.comments');

    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

}