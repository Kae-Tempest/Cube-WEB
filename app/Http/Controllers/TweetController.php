<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::with('user')->get();

        return view('tweet/tweets', [
            'tweets' => $tweets
        ]);
    }
}
