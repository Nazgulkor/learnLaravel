<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DonateController;


Route::prefix('user')->middleware('auth', 'active')->group(function(){
    Route::redirect('/', '/user/posts')->withoutMiddleware('auth');
    Route::get('/posts', [PostController::class, 'index'])->name('posts')->withoutMiddleware('auth');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->withoutMiddleware('auth');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->withoutMiddleware('auth');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->withoutMiddleware('auth');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->withoutMiddleware('auth');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->withoutMiddleware('auth');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
    Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::get('/donates', DonateController::class)->name('user.donates')->withoutMiddleware('auth');
});