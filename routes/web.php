<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect('profile/' . Auth::id());
    } else {
        return view('welcome');
    }
});

Auth::routes();
Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);
Route::post('/follow/{user}', [
    App\Http\Controllers\FollowsController::class,
    'store',
]);
Route::get('/profile/{user}/edit', [
    App\Http\Controllers\ProfileController::class,
    'edit',
])->name('profile.edit');
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show']);

Route::get('/profile/{user}', [
    App\Http\Controllers\ProfileController::class,
    'index',
])->name('profile.show');

Route::get('/profils/{user}', [
    App\Http\Controllers\ProfileController::class,
    'show',
])->name('profile.show');

Route::patch('/profile/{user}', [
    App\Http\Controllers\ProfileController::class,
    'update',
])->name('profile.update');
