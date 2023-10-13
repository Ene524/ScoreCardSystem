<?php

namespace App\Http\Controllers\User\Web;

use App\Exports\EmployeeExport;
use App\Exports\PermitExport;
use App\Exports\WorkdayExport;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\WorkdayType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

    public function employees()
    {
        $employees = Employee::all();
        return view("user.modules.report.employee.index", compact("employees"));
    }

    public function downloadEmployees()
    {
        return Excel::download(new EmployeeExport(), 'Personeller.xlsx');
    }

    public function workdays()
    {
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();
        return view("user.modules.report.workday.index", compact("employees", "workdayTypes"));
    }

    public function downloadWorkdays(Request $request)
    {
        return Excel::download(new WorkdayExport(), 'Çalışma Günleri.xlsx');
    }

    public function permits()
    {
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        $permitStatuses = PermitStatus::all();
        return view("user.modules.report.permit.index", compact("employees", "permitTypes", "permitStatuses"));
    }

    public function downloadPermits()
    {
        return Excel::download(new PermitExport(), 'İzinler.xlsx');
    }

    public function totalHourReport(Request $request)
    {
        $employees = Employee::all();
        return view("user.modules.report.totalHour.index", compact("employees"));
    }
}
