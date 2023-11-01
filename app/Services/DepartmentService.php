<?php

namespace App\Services;

use App\Core\ServiceResponse;
use App\Interfaces\IDepartmentService;
use App\Models\Department;

/**
 *
 */
class DepartmentService implements IDepartmentService
{

    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $departments = Department::all();
        return new ServiceResponse(true, "Departmanlar başarıyla getirildi", $departments, 200);
    }

    public function getById(int $id): ServiceResponse
    {
        $department = Department::find($id);
        if ($department == null) {
            return new ServiceResponse(false, "Departman bulunamadı", null, 404);
        }
        return new ServiceResponse(true, "Departman başarıyla getirildi", $department, 200);
    }

    public function update(int $id, array $data): ServiceResponse
    {
        $department = $this->findById($id);
        if ($department->isSuccess()) {
            $department = $department->getData();
            $department->name = $data['name'];
            $department->description = $data['description'];
            $department->status = $data['status'] != null ? 1 : 0;
            $department->save();
            return new ServiceResponse(true, "Departman başarıyla güncellendi", $department, 200);
        }
        return $department;
    }

    public function delete(int $id): ServiceResponse
    {
        // TODO: Implement delete() method.
        return new ServiceResponse(true,"",[],200);
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $status
     * @return ServiceResponse
     */
    public function create(string $name, string $description, string $status): ServiceResponse
    {
        $department = new Department();
        $department->name = $name;
        $department->description = $description;
        $department->status = $status != null ? 1 : 0;
        $department->save();
        return new ServiceResponse(true, "Departman başarıyla eklendi", $department, 200);
    }
}
