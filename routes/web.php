<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/status/{id}', [UserController::class, 'status'])->name('user.status');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/filter/{status}', [ReportController::class, 'report'])->name('report.bystatus');
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::put('/report/review', [ReportController::class, 'review'])->name('report.review');
    Route::get('/report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');
});
