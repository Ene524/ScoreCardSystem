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
        $workdaysTemp = Workday::with(['employee', 'workdayType'])
            ->select('workdays.employee_id', 'workdays.workday_type_id', 'employees.full_name as employee_name', 'workdays.start_date', 'workdays.end_date', 'workday_types.name as workday_type_name', 'workdays.status')
            ->join('employees', 'employees.id', '=', 'workdays.employee_id')
            ->join('workday_types', 'workday_types.id', '=', 'workdays.workday_type_id')
            ->get();


        if (request()->employee_id != null) {
            $workdaysTemp = $workdaysTemp->whereIn('employee_id', request()->employee_id);
        }

        if (request()->start_date != null && request()->end_date != null) {
            $workdaysTemp = $workdaysTemp->whereBetween('start_date', [request()->start_date, request()->end_date]);
        }

        if (request()->workday_type_id != null) {
            $workdaysTemp = $workdaysTemp->where('workday_type_id', request()->workday_type_id);
        }

        $workdays = $workdaysTemp->map(function ($workday) {
            return [
                'employee_name' => $workday->employee_name,
                'start_date' => $workday->start_date,
                'end_date' => $workday->end_date,
                'workday_type_name' => $workday->workday_type_name,
                'status' => $workday->status != null ? "Aktif" : 'Pasif',
            ];
        });

        return $workdays;


    }
}
