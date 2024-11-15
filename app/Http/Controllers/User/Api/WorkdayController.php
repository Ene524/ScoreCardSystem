<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkdayController extends Controller
{
    public function getAllWorkday(Request $request)
    {
        return response()->json(
            [
                'workdays' => Workday::with([
                    'employee'
                ])->whereBetween('start_date', [$request->start_date, $request->end_date])->get()
            ]
        );
    }

    public function totalWorkHours(Request $request)
    {
        $startDate = $request->start_date ?? "2000-01-01"; // Başlangıç tarihi
        $endDate = $request->end_date ?? "2100-01-01";   // Bitiş tarihi

        $reports = DB::table('employees')
            ->select('full_name', 'salaries.amount as salary')
            ->selectRaw('IFNULL((SELECT SUM(TIMESTAMPDIFF(HOUR, start_date, end_date)) FROM workdays WHERE workdays.employee_id = employees.id AND workdays.deleted_at is null AND workdays.start_date >= ? AND workdays.end_date <= ?), 0) as totalWorkTime', [$startDate, $endDate])
            ->selectRaw('IFNULL((SELECT SUM((TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15)) FROM permits WHERE permits.deleted_at is null AND permits.employee_id = employees.id AND permits.start_date >= ? AND permits.end_date <= ?), 0) as totalPermitTime', [$startDate, $endDate])
            ->join('salaries', 'salaries.id', '=', 'employees.salary_id')
            ->where('employees.deleted_at', null);

        if ($request->employee_ids && count($request->employee_ids) > 0) {
            $reports->whereIn('employees.id', $request->employee_ids);
        }


        return response()->json([
            'totalWorkHours' => $reports->get()
        ]);
    }
}
