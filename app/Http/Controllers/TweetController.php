<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\TweetComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tweets = Tweet::with('user')->orderBy('created_at', 'DESC')->get();

        return view('tweet/tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TweetContent' => ['required', 'min:1', 'max:250'],
            'user_id' => ['exists:users,id']
        ]);
        Tweet::create([
            'content' => $request->TweetContent,
            'user_id' => auth()->user()->id
        ]);
        return Redirect::route('tweet.comments');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect()->back();
    }
}