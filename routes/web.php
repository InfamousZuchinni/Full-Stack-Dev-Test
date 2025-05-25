<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function() {
    return "Hello World";
});

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');