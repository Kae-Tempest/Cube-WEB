<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $comments = Tweet::with('user')->orderBy('created_at','DESC')->get();
        return view('tweet/comment', [
            'comments' => $comments,
        ]);
    }
    public function store() {

    }

    public function destroy() {

    }

}
