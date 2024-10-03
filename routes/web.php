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

// To overcome this challenge, we can head to ./routes/web.php and define a single route that will catch all valid routes and use the Blade entry file which contains our Vue application.
// Route::get('/{vue_capture?}', function () {
//     return view('index');
// })->where('vue_capture', '[\/\w\.-]*');
// // Route::get('/admin', function () {
// //     //return view('welcome');
// //     return view('admin/dashboard');
// // });


// Route::get('redirect/{provider}', [App\Http\Controllers\SocialLoginController::class, 'redirectTo'])->name('social-login.redirect');
// Route::get('{provider}/callback', [App\Http\Controllers\SocialLoginController::class, 'handleCallback'])->name('social-login.callback');

// //Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
