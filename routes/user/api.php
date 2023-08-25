<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/user')->group(function () {
    Route::prefix('permit')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\Api\PermitController::class, 'index'])->name('api.user.permit.index');
    });
});
