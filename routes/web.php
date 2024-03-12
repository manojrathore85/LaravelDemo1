<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('redirect/{provider}', [App\Http\Controllers\SocialLoginController::class, 'redirectTo'])->name('social-login.redirect');
Route::get('{provider}/callback', [App\Http\Controllers\SocialLoginController::class, 'handleCallback'])->name('social-login.callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
