<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetTestController;
use App\Http\Controllers\PostController;
use App\Http\Requests\PostArticleRequest;


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

Route::get('/', function () {
    return view('toppage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gettest', [GetTestController::class, 'index']);
Route::get('/articles/create', [PostController::class, 'create'])->name('article.create');
Route::post('/articles', [PostController::class, 'store'])->name('article.store');

