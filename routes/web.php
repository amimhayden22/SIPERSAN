<?php


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

Route::resource('/rooms', App\Http\Controllers\RoomController::class);

Route::resource('/dormitories', App\Http\Controllers\DormitoryController::class);

