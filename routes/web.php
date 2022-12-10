<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Thesec
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tweet.tweets');
});

Auth::routes();

Route::get('/', [\App\Http\Controllers\TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets', [\App\Http\Controllers\TweetController::class, 'store'])->name('tweets.store');
Route::delete('/tweets/{tweet}', [\App\Http\Controllers\TweetController::class, 'destroy'])->name('tweets.destroy');
Route::get('/user/{user}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
Route::get('/{tweet}/comments', [\App\Http\Controllers\CommentController::class, 'index'])->name('tweet.comments');
