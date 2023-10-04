<?php

namespace App\Imports;

use App\Models\Salary;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeeImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dd($row);
        $department = Department::where('name', trim($row['department']))->first();
        $position = Position::where('name', trim($row['position']))->first();
        $salary = Salary::where('amount', trim($row['salary']))->first();

        return new Employee([
            'full_name' => trim($row['full_name']),
            'email' => trim($row['email']),
            'password' => '123456',
            'department_id' => $department->id,
            'position_id' => $position->id,
            'salary_id' => $salary->id,
            'employment_date' => trim($row['employment_date']),
            'status' => $row['status'],
        ]);
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:employees',
            'department' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'employment_date' => 'required',
            'status' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'full_name.required' => 'Ad Soyad alanı zorunludur',
            'email.required' => 'Email alanı zorunludur',
            'email.email' => 'Email alanı geçerli bir email olmalıdır',
            'email.unique' => 'Email alanı daha önce kullanılmış',
            'department.required' => 'Departman alanı zorunludur',
            'position.required' => 'Pozisyon alanı zorunludur',
            'salary.required' => 'Maaş alanı zorunludur',
            'employment_date.required' => 'İşe başlama tarihi alanı zorunludur',
            'status.required' => 'Durum alanı zorunludur',
        ];
    }
}
