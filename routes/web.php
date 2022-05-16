<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Dormitory;
use App\Models\User;
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

Route::prefix('dashboard')->group(function () {
    Route::resource('users', UserController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dormitories', [App\Http\Controllers\DormitoryController::class, 'index']);
// //Route::get('/dormitories/create', [App\Http\Controllers\DormitoryController::class, 'create']);
// Route::get('/dormitories/edit', [App\Http\Controllers\DormitoryController::class, 'edit']);
// Route::get('dormitories/edit', function(){
//     return view('dormitories.edit');
// });


//Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);
//Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'create']);
// Route::get('/rooms', function(){
//     return view('rooms.create');
// });

Route::resource('/rooms', App\Http\Controllers\RoomController::class);
Route::resource('/dormitories', App\Http\Controllers\DormitoryController::class);

