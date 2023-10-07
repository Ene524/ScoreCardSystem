<?php

use App\Http\Controllers\User\Api\PermitController;

use App\Http\Controllers\User\Api\WorkdayController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/user')->group(function () {
    Route::prefix('permit')->group(function () {
        Route::get('index', [PermitController::class, 'index'])->name('api.user.permit.index');
    });
    Route::prefix('workday')->group(function () {
        Route::get('index', [WorkdayController::class, 'getAllWorkday'])->name('api.user.workday.index');
        Route::get('totalWorkHours', [WorkdayController::class, 'totalWorkHours'])->name('api.user.workday.report');
        Route::get('getAllWorkdayWithParameter', [WorkdayController::class, 'getAllWorkdayWithParameter'])->name('api.user.workday.download');
    });
});
