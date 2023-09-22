<?php

namespace App\Http\Controllers\Employee\Api;

use App\Http\Controllers\Controller;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getWorkdays(Request $request)
    {
        #region withObject
//        return response()->json(
//            [
//                'workdays' => Workday::with(['employee'])
//                    ->whereBetween('start_date', [$request->start_date, $request->end_date])
//                    ->where('employee_id', $request->authUserId)
//                    ->where('status', '1')
//                    ->get()
//            ]
//        );
#endregion

        return response()->json(
            [
                'workdays' => DB::Select("SELECT
                workdays.id,
                workdays.start_date,
                workdays.end_date,
                workdays.status,
                workday_types.name,
                employees.full_name
                FROM workdays
                LEFT JOIN employees ON workdays.employee_id=employees.id
                LEFT JOIN workday_types ON workdays.workday_type_id=workday_types.id
                WHERE workdays.start_date BETWEEN ? AND ?
                AND workdays.employee_id=?
                AND workdays.status = 1", [$request->startDate, $request->endDate, $request->authUserId])
            ]
        );
    }

    public function getPermits(Request $request)
    {
        return response()->json(
            [
                'permits' => Permit::with([
                    'employee'
                ])->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->where('employee_id', auth()->user()->id)
                    ->where('status', '1')
                    ->get()
            ]
        );
    }

    public function getLastPermits(Request $request)
    {
        //dd($request->all());
        return response()->json(
            [
                'lastPermits' => DB::select("SELECT
        permits.id,
        employees.full_name,permits.start_date,permits.end_date,permit_types.name,
        (TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15) permitsTime,
        permits.description,permits.status
         FROM permits
        LEFT JOIN employees ON permits.employee_id=employees.id
        LEFT JOIN permit_types ON permits.permit_type_id=permit_types.id
        LEFT JOIN permit_statuses ON permits.permit_status_id=permit_statuses.id
        WHERE permits.status=1 AND permits.employee_id=?", [$request->authUserId])
            ]
        );
    }
}
