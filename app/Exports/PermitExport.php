<?php

namespace App\Exports;

use App\Models\Permit;
use Illuminate\Support\Facades\DB;
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
        $permits = DB::select("SELECT
            employees.full_name,
            permits.start_date,
            permits.end_date,
            permit_types.name AS permit_type_name,
            permit_statuses.name AS permit_status_name,
            (TIMESTAMPDIFF(hour, permits.start_date, permits.end_date)) - (FLOOR(TIMESTAMPDIFF(hour, permits.start_date, permits.end_date) / 24) * 15) AS permitHours,
            permits.description
        FROM permits
        JOIN employees ON employees.id = permits.employee_id
        JOIN permit_types ON permit_types.id = permits.permit_type_id
        JOIN permit_statuses ON permit_statuses.id = permits.permit_status_id
        WHERE permits.status=1");
        return collect($permits);
    }
}
