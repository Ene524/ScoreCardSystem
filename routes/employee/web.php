<?php


use App\Http\Controllers\Employee\Web\DashboardController;

use App\Http\Controllers\Employee\Web\LoginController;
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

Route::prefix('employee')->middleware("auth:employee")->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('employee.dashboard.index');
    Route::get('/logout', [LoginController::class, "logout"])->name("employee.logout");
});

Route::get('/employee/login', [LoginController::class, "showLogin"])->name("employee.login");
Route::post('/employee/login', [LoginController::class, "login"]);
