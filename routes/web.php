<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Google login
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    return response()->json($user);
});

// Facebook login
Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');

Route::get('/login/facebook/callback', function () {
    $user = Socialite::driver('facebook')->stateless()->user();
    return response()->json($user);
});
