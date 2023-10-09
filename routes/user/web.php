<?php

use App\Http\Controllers\User\Web\BatchTransactionsController;
use App\Http\Controllers\User\Web\DashboardController;
use App\Http\Controllers\User\Web\DepartmentController;
use App\Http\Controllers\User\Web\EmployeeController;
use App\Http\Controllers\User\Web\LoginController;
use App\Http\Controllers\User\Web\PermitController;
use App\Http\Controllers\User\Web\PermitStatusController;
use App\Http\Controllers\User\Web\PermitTypeController;
use App\Http\Controllers\User\Web\PositionController;
use App\Http\Controllers\User\Web\ReportController;
use App\Http\Controllers\User\Web\SalaryController;
use App\Http\Controllers\User\Web\UserController;
use App\Http\Controllers\User\Web\WorkdayController;
use App\Http\Controllers\User\Web\WorkdayTypeController;
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
        Route::get('getEmployees', [EmployeeController::class, 'getEmployees'])->name('user.employee.getEmployees');
        Route::get('create', [EmployeeController::class, 'create'])->name('user.employee.create');
        Route::post('create', [EmployeeController::class, 'store']);
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('user.employee.edit');
        Route::post('edit/{id}', [EmployeeController::class, 'update'])->name('user.employee.update');
        Route::delete('delete', [EmployeeController::class, 'delete'])->name("user.employee.delete");
        Route::get('export', [EmployeeController::class, 'export'])->name("user.employee.export");
    });

    Route::prefix('workday')->group(function () {
        Route::get('index', [WorkdayController::class, 'index'])->name('user.workday.index');
        Route::get('indexCalendar', [WorkdayController::class, 'index2'])->name('user.workday.indexCalendar');
        Route::get('create', [WorkdayController::class, 'create'])->name('user.workday.create');
        Route::post('create', [WorkdayController::class, 'store']);
        Route::get('edit/{id}', [WorkdayController::class, 'edit'])->name('user.workday.edit');
        Route::post('edit/{id}', [WorkdayController::class, 'update'])->name('user.workday.update');
        Route::delete('delete', [WorkdayController::class, 'delete'])->name("user.workday.delete");
        Route::get('export', [WorkdayController::class, 'export'])->name("user.workday.export");
    });

    Route::prefix('permit')->group(function () {
        Route::get('index', [PermitController::class, 'index'])->name('user.permit.index');
        Route::get('indexCalendar', [PermitController::class, 'index2'])->name('user.permit.indexCalendar');
        Route::get('create', [PermitController::class, 'create'])->name('user.permit.create');
        Route::post('create', [PermitController::class, 'store']);
        Route::get('edit/{id}', [PermitController::class, 'edit'])->name('user.permit.edit');
        Route::post('edit/{id}', [PermitController::class, 'update'])->name('user.permit.update');
        Route::delete('delete', [PermitController::class, 'delete'])->name("user.permit.delete");
        Route::get('export', [PermitController::class, 'export'])->name('user.permit.export');
    });

    Route::prefix('department')->middleware('role:Admin')->group(function () {
        Route::get('index', [DepartmentController::class, 'index'])->name('user.department.index');
        Route::get('create', [DepartmentController::class, 'create'])->name('user.department.create');
        Route::post('create', [DepartmentController::class, 'store']);
        Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('user.department.edit');
        Route::post('edit/{id}', [DepartmentController::class, 'update'])->name('user.department.update');
        Route::delete('delete', [DepartmentController::class, 'delete'])->name("user.department.delete");
    });

    Route::prefix('position')->middleware('role:Admin')->group(function () {
        Route::get('index', [PositionController::class, 'index'])->name('user.position.index');
        Route::get('create', [PositionController::class, 'create'])->name('user.position.create');
        Route::post('create', [PositionController::class, 'store']);
        Route::get('edit/{id}', [PositionController::class, 'edit'])->name('user.position.edit');
        Route::post('edit/{id}', [PositionController::class, 'update'])->name('user.position.update');
        Route::delete('delete', [PositionController::class, 'delete'])->name("user.position.delete");
    });

    Route::prefix('permitType')->middleware('role:Admin')->group(function () {
        Route::get('index', [PermitTypeController::class, 'index'])->name('user.permitType.index');
        Route::get('create', [PermitTypeController::class, 'create'])->name('user.permitType.create');
        Route::post('create', [PermitTypeController::class, 'store']);
        Route::get('edit/{id}', [PermitTypeController::class, 'edit'])->name('user.permitType.edit');
        Route::post('edit/{id}', [PermitTypeController::class, 'update'])->name('user.permitType.update');
        Route::delete('delete', [PermitTypeController::class, 'delete'])->name("user.permitType.delete");
    });

    Route::prefix('permitStatus')->middleware('role:Admin')->group(function () {
        Route::get('index', [PermitStatusController::class, 'index'])->name('user.permitStatus.index');
        Route::get('create', [PermitStatusController::class, 'create'])->name('user.permitStatus.create');
        Route::post('create', [PermitStatusController::class, 'store']);
        Route::get('edit/{id}', [PermitStatusController::class, 'edit'])->name('user.permitStatus.edit');
        Route::post('edit/{id}', [PermitStatusController::class, 'update'])->name('user.permitStatus.update');
        Route::delete('delete', [PermitStatusController::class, 'delete'])->name("user.permitStatus.delete");
    });

    Route::prefix('salary')->group(function () {
        Route::get('index', [SalaryController::class, 'index'])->name('user.salary.index');
        Route::get('create', [SalaryController::class, 'create'])->name('user.salary.create');
        Route::post('create', [SalaryController::class, 'store']);
        Route::get('edit/{id}', [SalaryController::class, 'edit'])->name('user.salary.edit');
        Route::post('edit/{id}', [SalaryController::class, 'update'])->name('user.salary.update');
        Route::delete('delete', [SalaryController::class, 'delete'])->name("user.salary.delete");
    });

    Route::prefix('batchTransactions')->middleware('role:Admin')->group(function () {
        Route::get('addEmployee', [BatchTransactionsController::class, 'addEmployeeindex'])->name('user.batchTransactions.addEmployee');
        Route::post('addEmployee', [BatchTransactionsController::class, 'addEmployeeUpload']);
        Route::get('download/EmployeeTemplate', [BatchTransactionsController::class, 'downloadEmployeeTemplate'])->name('user.batchTransactions.downloadEmployeeTemplate');

        Route::get('addWorkday', [BatchTransactionsController::class, 'addWorkdayindex'])->name('user.batchTransactions.addWorkday');
        Route::post('addWorkday', [BatchTransactionsController::class, 'addWorkday']);
    });

    Route::prefix('user')->middleware('role:Admin')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('user.user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.user.create');
        Route::post('create', [UserController::class, 'store']);
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.user.edit');
        Route::post('edit/{id}', [UserController::class, 'update'])->name('user.user.update');
        Route::delete('delete', [UserController::class, 'delete'])->name("user.user.delete");
    });

    Route::prefix('workdayType')->middleware('role:Admin')->group(function () {
        Route::get('index', [WorkdayTypeController::class, 'index'])->name('user.workdayType.index');
        Route::get('create', [WorkdayTypeController::class, 'create'])->name('user.workdayType.create');
        Route::post('create', [WorkdayTypeController::class, 'store']);
        Route::get('edit/{id}', [WorkdayTypeController::class, 'edit'])->name('user.workdayType.edit');
        Route::post('edit/{id}', [WorkdayTypeController::class, 'update'])->name('user.workdayType.update');
        Route::delete('delete', [WorkdayTypeController::class, 'delete'])->name("user.workdayType.delete");
    });

    Route::prefix('report')->middleware('role:Admin')->group(function () {
        Route::get('employee', [ReportController::class, 'employees'])->name('user.report.employee.index');
        Route::post('downloadEmployees', [ReportController::class, 'downloadEmployees'])->name('user.report.employee.download');

        Route::get('workday', [ReportController::class, 'workdays'])->name('user.report.workday.index');
        Route::post('downloadWorkdays', [ReportController::class, 'downloadWorkdays'])->name('user.report.workday.download');

        Route::get('permit', [ReportController::class, 'permits'])->name('user.report.permit.index');
        Route::post('downloadPermits', [ReportController::class, 'downloadPermits'])->name('user.report.permit.download');

        Route::get('totalHour', [ReportController::class, 'totalHourReport'])->name('user.report.totalHour.index');
        Route::post('totalHourShowReport', [ReportController::class, 'totalHourShowReport'])->name('user.report.totalHour.download');
    });


    Route::get('/logout', [LoginController::class, "logout"])->name("user.logout");
});

Route::get('/user/login', [LoginController::class, "showLogin"])->name("user.login");
Route::post('/user/login', [LoginController::class, "login"]);
