<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Auth::routes(
    ['register' => false]
);
Route::get('/', function () {
    return redirect('login');
});

Route::prefix('dashboard')->group(function () {
    Route::resource('users', UserController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
