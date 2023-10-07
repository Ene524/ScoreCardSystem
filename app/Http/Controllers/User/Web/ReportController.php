<?php

namespace App\Http\Controllers\User\Web;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\PermitExport;
use App\Exports\WorkdayExport;
use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

    public function users(){
        $employees = Employee::all();
        return view("user.modules.report.employee.index",compact("employees"));
    }

    public function downloadUsers(){
        return Excel::download(new EmployeeExport(), 'Personeller.xlsx');
    }

    public function workdays(){
        $employees = Employee::all();
        return view("user.modules.report.workday.index",compact("employees"));
    }

    public function downloadWorkdays(){
        return Excel::download(new WorkdayExport(), 'Çalışma Günleri.xlsx');
    }

    public function permits(){
        $employees = Employee::all();
        return view("user.modules.report.permit.index",compact("employees"));
    }

    public function downloadPermits(){
        return Excel::download(new PermitExport(), 'İzinler.xlsx');
    }

    public function totalHourReport(Request $request)
    {
        $employees = Employee::all();
        return view("user.modules.report.totalHour.index", compact("employees"));
    }
}
