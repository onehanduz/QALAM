<?php

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

