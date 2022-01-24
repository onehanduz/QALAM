<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfilesController::class, 'index']);
Route::get('/edit', [ProfilesController::class, 'edit']);
Route::get('/change', [ProfilesController::class, 'change']);
Route::put('/update', [ProfilesController::class, 'update']);
Route::put('/change/password', [ProfilesController::class, 'changepassword'])->name('change');

// Route::get('/add', function () {
//     return view('post/add');
// });

// Route::get('/posts', function () {
//     return view('post/posts');
// });

// Route::get('/search', function () {
//     return view('search');
// });

// Route::get('/edit', function () {
//     return view('edit');
// });

// Route::get('/comment', function () {
//     return view('post/comment');
// });