<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DormitoryController;
use App\Http\Controllers\TransactionController;

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
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::put('users/update/profile/{user}', [UserController::class, 'updateProfile'])->name('users.update-profile');

    Route::resource('/dormitories', DormitoryController::class);
    Route::resource('/rooms', RoomController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('users', UserController::class);
});
