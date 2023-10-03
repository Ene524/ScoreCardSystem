<?php

namespace App\Exports;

use App\Models\Permit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PermitExport implements FromCollection, WithHeadings
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
            'İzin Saati',
            'İzin Türü',
            'Status',
        ];
    }

    public function collection()
    {
        return Permit::with('employee', 'permitType', 'permitStatus')
            ->selectRaw('
                employees.full_name,
                DATE_FORMAT(permits.start_date, "%d.%m.%Y %H:%i") AS start_date,
                DATE_FORMAT(permits.end_date, "%d.%m.%Y %H:%i") AS end_date,
                 (TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15),
                permit_types.name,
                permit_statuses.name
            ')
            ->join('employees', 'employees.id', '=', 'permits.employee_id')
            ->join('permit_types', 'permit_types.id', '=', 'permits.permit_type_id')
            ->join('permit_statuses', 'permit_statuses.id', '=', 'permits.permit_status_id')
            ->get();
    }
}
