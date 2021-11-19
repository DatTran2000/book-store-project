<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

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

// route for mailing
Route::get('/email',\App\Http\Controllers\MailController::class,'index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google login
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    return redirect('/home');
});

// Twitter login 
Route::get('/login/twitter', function () {
    return Socialite::driver('twitter')->redirect();
});

Route::get('/login/twitter/callback', function () {
    $user = Socialite::driver('twitter')->user();
    return redirect('/home');
});

// Facebook login
Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');

Route::get('/login/facebook/callback', function () {
    $user = Socialite::driver('facebook')->stateless()->user();
    return response()->json($user);
});


// Login Line
Route::get('line/login/', [LoginController::class,'index'])->name('login.line');
// Callback url
Route::get('line/login/callback', [LoginController::class,'handleLineCallback'])->name('login.line.callback');
