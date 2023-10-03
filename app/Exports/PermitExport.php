<?php

namespace App\Exports;

use App\Models\Permit;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermitExport implements FromCollection
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
            'İzin Türü',
            'Status',
        ];
    }

    public function collection()
    {
        return Permit::with('employee','permitType','permitStatus')
            ->selectRaw('
                employees.full_name,
                permits.start_date,
                permits.end_date,
                permit_types.name,
                permit_statuses.name
            ')
            ->join('employees', 'employees.id', '=', 'permits.employee_id')
            ->join('permit_types', 'permit_types.id', '=', 'permits.permit_type_id')
            ->join('permit_statuses', 'permit_statuses.id', '=', 'permits.permit_status_id')
            ->get();
    }
}
