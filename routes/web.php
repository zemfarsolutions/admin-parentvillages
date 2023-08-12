<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/check', [AuthController::class, 'check']);
Route::post('/logout', [AuthController::class, 'destroy']);

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('/users', UserController::class);
    Route::resource('/employees', EmployeeController::class);
});
