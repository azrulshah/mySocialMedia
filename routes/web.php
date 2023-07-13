<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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

Route::get('post', [PostController::class, 'index'])->middleware('auth');
Route::get('post/{id}', [PostController::class, 'show'])->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
