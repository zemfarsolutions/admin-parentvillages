<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AppointmentController,
    EmployeeController,
    MileageLogController,
    TimeTrackingController,
    UserController,
    ReceiptController,
    ExpenseController,
    IntakeController
};

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

    Route::resource('/time-trackings', TimeTrackingController::class)->except(['destroy']);
    Route::post('/time-trackings/delete/{time_tracking}', [TimeTrackingController::class, 'destroy']);

    Route::resource('/mileage-logs', MileageLogController::class)->except(['destroy']);
    Route::post('/mileage-logs/delete/{mileage_log}', [MileageLogController::class, 'destroy']);

    Route::resource('/receipts', ReceiptController::class)->except(['destroy']);
    Route::post('/receipts/delete/{receipt}', [ReceiptController::class, 'destroy']);

    Route::resource('/expenses', ExpenseController::class)->except(['destroy']);
    Route::post('/expenses/delete/{expense}', [ExpenseController::class, 'destroy']);

    Route::resource('/intakes', IntakeController::class)->except(['destroy']);
    Route::get('/intakes/{intake}/view', [IntakeController::class, 'view']);

    Route::resource('/appointments', AppointmentController::class)->except(['destroy']);
    Route::post('/appointments/delete/{appointment}', [AppointmentController::class, 'destroy']);
});
