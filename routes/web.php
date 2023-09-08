<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AccessController,
    AppliedScholarshipController,
    ScholarshipController,
    AppointmentController,
    EmployeeController,
    EvaluationController,
    MileageLogController,
    TimeTrackingController,
    UserController,
    ReceiptController,
    ExpenseController,
    IntakeController,
    ResourceController,
    ProfileController
};
use App\Models\Evaluation;

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

    Route::resource('/users', UserController::class)->except(['destroy']);
    Route::post('/users/delete/{user}', [UserController::class, 'destroy']);

    Route::resource('/employees', EmployeeController::class)->except(['destroy']);
    Route::post('/employees/delete/{employee}', [EmployeeController::class, 'destroy']);

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
    Route::post('/intakes/delete/{intake}', [IntakeController::class, 'destroy']);

    Route::resource('/appointments', AppointmentController::class)->except(['destroy']);
    Route::post('/appointments/delete/{appointment}', [AppointmentController::class, 'destroy']);

    Route::resource('/scholarships', ScholarshipController::class)->except(['destroy']);

    Route::resource('/evaluations', EvaluationController::class)->except(['destroy']);
    Route::get('/evaluations/delete/{evaluation}', [EvaluationController::class, 'destroy']);

    Route::resource('/admin/documents', ResourceController::class)->except(['destroy']);
    Route::get('/admin/documents/reviews/create/{document}', [ResourceController::class, 'showCreateForm']);
    Route::post('/admin/documents/reviews', [ResourceController::class, 'storeReview'])->name('review.store');
    Route::post('/admin/documents/reviews/delete/{review}', [ResourceController::class, 'destroyReview'])->name('review.delete');
    Route::get('/admin/documents/{document}/delete', [ResourceController::class, 'destroy']);

    Route::get('/evaluations/accessibility/delete/{evaluation}', [AccessController::class, 'destroy']);
    Route::get('/evaluations/accessibility/{evaluation:slug}', [AccessController::class, 'index']);
    Route::get('/evaluations/accessibility/create/{evaluation:slug}', [AccessController::class, 'create']);
    Route::post('/evaluations/accessibility/{evaluation}', [AccessController::class, 'store']);

    Route::resource('/profile', ProfileController::class)->except(['store']);
    Route::get('/change-password', [ProfileController::class, 'password_index']);
    Route::post('/change-password/{user}', [ProfileController::class, 'passwordEdit']);
    Route::post('/change-profile/{user}', [ProfileController::class, 'profileEdit']);

    Route::resource('/applicants', AppliedScholarshipController::class)->except(['show']);
    Route::get('/applicants/{userapplication:slug}/view', [AppliedScholarshipController::class, 'show']);
});
