<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [LoginController::class, 'login'])->name("login");
Route::post('/', [LoginController::class, 'checkLogin'])->name("log_form");
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [SignupController::class, 'signupPage'])->name("signup"); 
Route::post('/signup', [SignupController::class, 'createUser'])->name("registration");
Route::get('/signup/username/{q}', [SignupController::class, 'checkUsername']);
Route::get('/signup/email/{q}', [SignupController::class, 'checkEmail']);

Route::get('/home', [HomeController::class, 'enter'])->name('home');

Route::get('/home/showPlay', [SearchController::class, 'showPlay']);
Route::get('/home/showPref', [SearchController::class, 'showPref']);
Route::get('/home/removePlay/{song_id}', [SearchController::class, 'removeSongPlay']);
Route::get('/home/removePref/{song_id}', [SearchController::class, 'removeSongPref']);

Route::post('/home/createPost', [PostController::class, 'createPost'])->name('createPost');
Route::get('/home/getPost', [PostController::class, 'getPost']);
Route::get('/home/deletePost/{id_post}', [PostController::class, 'deletePost']);
Route::get('/home/addLike/{id_post}/{username}', [PostController::class, 'addLike']);
Route::get('/home/removeLike/{id_post}/{username}', [PostController::class, 'removeLike']);

Route::get('/search', [SearchController::class, 'enter'])->name('search');
Route::get('/search/song/{text}', [SearchController::class, 'searchSong']);
Route::get('/search/addSongPlay', [SearchController::class, 'addSongPlay']);
Route::get('/search/addSongPref', [SearchController::class, 'addSongPref']);
