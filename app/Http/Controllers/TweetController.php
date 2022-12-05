<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
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
    public function index() {
        $tweets = Tweet::with('user')->get();

        return view('tweet/tweets', [
            'tweets' => $tweets
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'content' => ['required','min:1', 'max:250'],
            'user_id' => ['exists:users,id']
        ]);
        Tweet::create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return Redirect::route('tweets.index');
    }
}
