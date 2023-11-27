<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/incidentReportForm', function () {
        return view('incidentReportForm');
 Route::get('/admin/dashboard', [HomeController::class, 'adminBody'])->name('admin.dashboard');
    });
   
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/Reports', [ReportController::class, 'index'])->name('report.index');
        Route::get('/Reports/{report}/edit', [ ReportController::class, 'edit'])->name('report.edit');
        Route::put('/Reports/{report}/update', [ ReportController::class, 'update'])->name('report.update');
        Route::delete('/Reports/{report}/delete', [ ReportController::class, 'delete'])->name('report.delete');
        Route::put('/Reports/{report}/verify', [ReportController::class, 'verify'])->name('report.verify');
        Route::put('/Reports/{report}/reject', [ReportController::class, 'reject'])->name('report.reject');
        Route::get('/admin/dashboard', [ReportController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/admin/users/{user}/reports', [ReportController::class, 'adminUserReports'])->name('admin.userReports');
        Route::post('/Reports/{report}/mark-solved', [ReportController::class, 'markSolved'])->name('report.markSolved');
Route::post('/Reports/{report}/mark-unsolved', [ReportController::class, 'markUnsolved'])->name('report.markUnsolved');

        // ... other report routes
    });
    
    Route::get('/Reports/incidentReportForm', [ ReportController::class, 'incidentReportForm'])->name('report.incidentReportForm');
    Route::post('/Reports', [ ReportController::class, 'store'])->name('report.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user/UserReportForm', [HomeController::class, 'UserReportForm'])->name('user.UserReportForm');
    Route::get('/user/reportSummary', [HomeController::class, 'userReportSummary'])
    ->name('user.reportSummary')
    ->middleware('auth');
    Route::post('/reports/{report}/verify', [ReportController::class, 'verify'])->name('report.verify');
    Route::post('/Reports/{report}/reject', [ReportController::class, 'reject'])->name('report.reject');
    Route::get('admin/adminBody', [ReportController::class, 'overallReportSummary']);
    Route::get('admin/adminBody', [ReportController::class, 'overallReportSummary'])->name('admin.overallReportSummary');
    Route::get('/user/userProfile', [ProfileController::class, 'userProfile'])->name('user.userProfile');
    Route::get('/admin/overall', [ReportController::class, 'overallReportSummary'])->name('admin.overall');
    Route::post('/handle-file-upload', 'ReportController@handleFileUpload')->name('report.handleFileUpload');


    
    
    
});

require __DIR__.'/auth.php';
