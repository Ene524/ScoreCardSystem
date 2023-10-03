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
            'İzin Türü',
            'İzin Durumu',
            'İzin Saati',
            'Açıklama'
        ];
    }

    public function collection()
    {
        return Permit::with('employee', 'permitType', 'permitStatus')
            ->selectRaw('
                employees.full_name,
                  CONVERT(permits.start_date, CHAR) start_date,
                  CONVERT(permits.end_date, CHAR) end_date,
                    permit_types.name,
                    permit_statuses.name,
                 (TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15),
                permits.description
            ')
            ->join('employees', 'employees.id', '=', 'permits.employee_id')
            ->join('permit_types', 'permit_types.id', '=', 'permits.permit_type_id')
            ->join('permit_statuses', 'permit_statuses.id', '=', 'permits.permit_status_id')
            ->get();
    }
}
