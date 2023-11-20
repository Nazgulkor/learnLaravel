<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::view('/', 'home.index')->name('home');
Route::redirect('/home', '/');




Route::prefix('')->group(function (){
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show')->middleware('show');
    Route::put('/blog/{post}/like', [PostController::class, 'like'])->name('blog.like');
});





Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});












Route::fallback(function(){
    return 'fallback';
});