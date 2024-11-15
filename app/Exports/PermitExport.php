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
            'Açıklama'
        ];
    }

    public function collection()
    {
        $permitsTemp = Permit::with(['employee', 'permitType', 'permitStatus'])
            ->select(
                'employees.full_name as employee_name',
                'permits.start_date',
                'permits.end_date',
                'permits.permit_type_id',
                'permit_types.name as permit_type_name',
                'permits.permit_status_id',
                'permit_statuses.name as permit_status_name',
                'permits.description'
            )
            ->join('employees', 'employees.id', '=', 'permits.employee_id')
            ->join('permit_types', 'permit_types.id', '=', 'permits.permit_type_id')
            ->join('permit_statuses', 'permit_statuses.id', '=', 'permits.permit_status_id')
            ->get();



        if (request()->employee_id != null) {
            $permitsTemp = $permitsTemp->whereIn('employee_id', request()->employee_id);
        }



        if (request()->start_date != null && request()->end_date != null) {
            $permitsTemp = $permitsTemp->whereBetween('start_date', [request()->start_date, request()->end_date]);
        }


        if (request()->permit_type_id != null) {
            $permitsTemp = $permitsTemp->where('permit_type_id', request()->permit_type_id);
        }



        if (request()->permit_status_id != null) {
            $permitsTemp = $permitsTemp->where('permit_status_id', request()->permit_status_id);
        }

        $permits = $permitsTemp->map(function ($permit) {
            return [
                'employee_name' => $permit->employee_name,
                'start_date' => $permit->start_date,
                'end_date' => $permit->end_date,
                'permit_type_name' => $permit->permit_type_name,
                'permit_status_name' => $permit->permit_status_name,
                'description' => $permit->description,
            ];
        });

        return $permits;
    }
}
