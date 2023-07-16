<?php

use App\Http\Controllers\CommentConntroller;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [GeneralController::class, 'index'])->name('dashboard');
    
    Route::get('/create-tweet', [TweetController::class, 'create'])->name('tweet.create');
    Route::post('/store-tweet', [TweetController::class, 'store'])->name('tweet.store');
    Route::get('/tweet/{id}', [TweetController::class, 'show'])->name('tweet.show');
    Route::get('/tweet/edit/{id}', [TweetController::class, 'edit'])->name('tweet.edit');
    Route::post('/update-tweet', [TweetController::class, 'update'])->name('tweet.update');
    Route::post('/delete-tweet/{id}', [TweetController::class, 'destroy'])->name('tweet.delete');

    Route::post('/comment-store', [CommentConntroller::class, 'store'])->name('comment.store');
    Route::post('/delete-comment/{id}', [CommentConntroller::class, 'destroy'])->name('comment.delete');
});
