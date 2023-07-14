<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// DB::listen(function ($event) {
//     dump($event->sql);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    echo 'Dari route test';
});

Route::post('comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');

Route::get('post', [PostController::class, 'index'])->name('post.index')->middleware('auth');
Route::get('post/{id}', [PostController::class, 'show'])->middleware('auth');
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
