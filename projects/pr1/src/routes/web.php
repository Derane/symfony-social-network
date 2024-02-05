<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hello docker";
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/tests', [TestController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'index']);
Route::get('/posts/{post}/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'show']);
