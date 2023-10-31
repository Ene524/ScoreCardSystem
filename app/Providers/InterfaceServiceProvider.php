<?php

namespace App\Providers;

use App\Interfaces\IDepartmentService;
use App\Services\DepartmentService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            IDepartmentService::class,
            DepartmentService::class,

        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
