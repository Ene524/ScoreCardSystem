<?php

namespace App\Interfaces;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IEloquentService;

interface IDepartmentService extends IEloquentService
{
    public function update(int $id, array $data): ServiceResponse;

}
