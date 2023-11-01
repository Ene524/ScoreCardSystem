<?php

namespace App\Interfaces;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IEloquentService;

interface IDepartmentService extends IEloquentService
{
    public function create(
        string $name,
        string $description,
        string $status
    ): ServiceResponse;

    public function update(int $id, array $data): ServiceResponse;

}
