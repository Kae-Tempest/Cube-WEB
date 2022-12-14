<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use \App\Models\User;
use App\Models\Tweet;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user) {
        $tweets = Tweet::with('user')->orderBy('created_at','DESC')->get();
        $comments = Comment::with('user')->orderBy('created_at', 'DESC')->get();
        return view('user.profile', compact('user'),['tweets' => $tweets, 'comments' => $comments]);
    }
}
