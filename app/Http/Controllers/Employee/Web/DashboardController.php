<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
//        $lastPermits = DB::select("SELECT
//        permits.id,
//        employees.full_name,permits.start_date,permits.end_date,permit_types.name,
//        (TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15) permitsTime,
//        permits.description,permits.status
//         FROM permits
//        LEFT JOIN employees ON permits.employee_id=employees.id
//        LEFT JOIN permit_types ON permits.permit_type_id=permit_types.id
//        LEFT JOIN permit_statuses ON permits.permit_status_id=permit_statuses.id
//        WHERE permits.status=1 AND permits.employee_id=?", 0);

        return view('employee.modules.dashboard.index.index' );
    }
}
