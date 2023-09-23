<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'Ad Soyad',
            'Email',
            'Departman',
            'Pozisyon',
            'Maaş',
            'İşe Giriş Tarihi',
            'Durumu',
        ];
    }


    public function collection()
    {
        return Employee::with(['department', 'position', 'salary'])
            ->selectRaw('
        employees.full_name,
        employees.email,
        departments.name as department_name,
        positions.name as position_name,
        salaries.amount,
        DATE_FORMAT(employees.employment_date, "%d.%m.%Y"),
        employees.status
    ')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('positions', 'positions.id', '=', 'employees.position_id')
            ->join('salaries', 'salaries.id', '=', 'employees.salary_id')
            ->get();

    }
}
