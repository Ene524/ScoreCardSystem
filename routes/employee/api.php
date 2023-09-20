<?php

use App\Http\Controllers\Employee\Api\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/employee')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('getWorkdays', [DashboardController::class, 'getWorkdays'])->name('api.employee.dashboard.getWorkdays');
        Route::get('getPermits', [DashboardController::class, 'getPermits'])->name('api.employee.dashboard.getPermits');
    });
});



