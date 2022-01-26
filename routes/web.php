<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * User routes
*/
Route::get('/profile', [ProfilesController::class, 'index'])->name('index');
Route::get('/edit', [ProfilesController::class, 'edit'])->name('edit');
Route::get('/show/{id}', [ProfilesController::class, 'show'])->name('show');
Route::get('/change', [ProfilesController::class, 'change'])->name('change');
Route::put('/update', [ProfilesController::class, 'update'])->name('update');
Route::put('/change/password', [ProfilesController::class, 'change_password'])->name('change_password');

/**
 * Post routes
 */
Route::get('/p', [PostController::class, 'index'])->name('post_index');
Route::get('/p/add', [PostController::class, 'add'])->name('post_add');
Route::put('/p/store', [PostController::class, 'store'])->name('post_store');
Route::get('/p/edit/{id}', [PostController::class, 'edit'])->name('post_edit');
Route::put('/p/update/{id}', [PostController::class, 'update'])->name('post_update');
Route::get('/p/comment', [PostController::class, 'comments'])->name('post_comments');
Route::get('/p/show/{id}', [PostController::class, 'show'])->name('post_show');

/**
 * Comment routes
 */
Route::put('/p/{id}/comment', [CommentController::class, 'store'])->name('comment_store');
Route::get('/comment/{id}', [CommentController::class, 'edit'])->name('comment_edit');
Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment_update');
Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment_delete');

/**
 * Like dislike follow routes
 */
Route::put('/like/{id}', [LikeController::class, 'store'])->name('like');
Route::put('/silike/{id}', [LikeController::class, 'store'])->name('dislike');
Route::put('/follow/{id}', [FollowController::class, 'store'])->name('follow');