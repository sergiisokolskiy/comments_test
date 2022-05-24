<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController\Blog\PostController;
use App\Http\Controllers\APIController\Blog\CommentController;
use App\Http\Controllers\APIController\Blog\PostCommentController;


Route::get('/', function () {
   return [];
});

Route::apiResource('blog/posts', PostController::class)
    ->names('api.blog.posts');

Route::apiResource('blog/posts/{post}/comments',CommentController::class)
    ->names('api.blog.comments');
