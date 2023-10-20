<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ReportController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/incidentReportForm', function () {
    return view('incidentReportForm');
});

Route::get('/Reports', [ ReportController::class, 'index'])->name('report.index');
Route::get('/Reports/incidentReportForm', [ ReportController::class, 'incidentReportForm'])->name('report.incidentReportForm');
Route::post('/Reports', [ ReportController::class, 'store'])->name('report.store');
Route::get('/Reports/{report}/edit', [ ReportController::class, 'edit'])->name('report.edit');
Route::put('/Reports/{report}/update', [ ReportController::class, 'update'])->name('report.update');
Route::delete('/Reports/{report}/delete', [ ReportController::class, 'delete'])->name('report.delete');