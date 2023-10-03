<?php

namespace App\Exports;

use App\Models\Workday;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkdayExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'Ad Soyad',
            'Başlangıç Tarihi',
            'Bitiş Tarihi',
            'Çalışma Günü Türü',
            'Status',
        ];
    }

    public function collection()
    {
        return Workday::with(['employee', 'workdayType'])
            ->selectRaw('
                 employees.full_name,
                 CONVERT(workdays.start_date, CHAR) start_date,
                 CONVERT(workdays.end_date, CHAR) end_date,
                 workday_types.name,
                 workdays.status
            ')
            ->join('employees', 'employees.id', '=', 'workdays.employee_id')
            ->join('workday_types', 'workday_types.id', '=', 'workdays.workday_type_id')
            //            ->whereBetween('workdays.start_date', [request()->start_date, request()->end_date])
            //Duruma göre bu alan da kontrol edilecek
            ->get();
    }
}
