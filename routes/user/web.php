<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EmployeeController;
use App\Http\Controllers\User\PermitController;
use App\Http\Controllers\User\WorkdayController;
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

Route::prefix('user')->middleware("auth")->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard.index');
    Route::prefix('employee')->group(function () {
        Route::get('index', [EmployeeController::class, 'index'])->name('user.employee.index');
        Route::get('create', [EmployeeController::class, 'create'])->name('user.employee.create');
        Route::post('create', [EmployeeController::class, 'store']);
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('user.employee.edit');
        Route::post('edit/{id}', [EmployeeController::class, 'update'])->name('user.employee.update');
        Route::delete('delete', [EmployeeController::class, 'delete'])->name("user.employee.delete");
    });

    Route::prefix('workday')->group(function () {
        Route::get('index', [WorkdayController::class, 'index'])->name('user.workday.index');
        Route::get('indexCalendar', [WorkdayController::class, 'index2'])->name('user.workday.indexCalendar');
        Route::get('report', [WorkdayController::class, 'report'])->name('user.workday.report');
        Route::get('create', [WorkdayController::class, 'create'])->name('user.workday.create');
        Route::post('create', [WorkdayController::class, 'store']);
        Route::get('edit/{id}', [WorkdayController::class, 'edit'])->name('user.workday.edit');
        Route::post('edit/{id}', [WorkdayController::class, 'update'])->name('user.workday.update');
        Route::delete('delete', [WorkdayController::class, 'delete'])->name("user.workday.delete");
    });

    Route::prefix('permit')->group(function () {
        Route::get('index', [PermitController::class, 'index'])->name('user.permit.index');
        Route::get('indexCalendar', [PermitController::class, 'index2'])->name('user.permit.indexCalendar');
        Route::get('create', [PermitController::class, 'create'])->name('user.permit.create');
        Route::post('create', [PermitController::class, 'store']);
        Route::get('edit/{id}', [PermitController::class, 'edit'])->name('user.permit.edit');
        Route::post('edit/{id}', [PermitController::class, 'update'])->name('user.permit.update');
        Route::delete('delete', [PermitController::class, 'delete'])->name("user.permit.delete");
    });

    Route::get('/logout', [LoginController::class, "logout"])->name("logout");
});

Route::get('/', [LoginController::class, "showLogin"])->name("login");
Route::post('/', [LoginController::class, "login"]);





