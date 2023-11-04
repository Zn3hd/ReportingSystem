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
    });
    
    Route::get('/Reports', [ ReportController::class, 'index'])->name('report.index');
    Route::get('/Reports/incidentReportForm', [ ReportController::class, 'incidentReportForm'])->name('report.incidentReportForm');
    Route::post('/Reports', [ ReportController::class, 'store'])->name('report.store');
    Route::get('/Reports/{report}/edit', [ ReportController::class, 'edit'])->name('report.edit');
    Route::put('/Reports/{report}/update', [ ReportController::class, 'update'])->name('report.update');
    Route::delete('/Reports/{report}/delete', [ ReportController::class, 'delete'])->name('report.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
