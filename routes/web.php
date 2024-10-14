<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk About
Route::get('/about', function () {
    $posts = Post::all(); // Model Post sudah benar
    return view('about', ['posts' => $posts]);
});

// Route untuk Register
Route::post('/register', [UserController::class, 'register']);

// Rute yang berhubungan dengan blog post
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

