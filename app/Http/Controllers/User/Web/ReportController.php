<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function users()
    {
        $employees = Employee::all();
        return view("user.modules.report.employee.index",compact("employees"));
    }

    public function workdays()
    {
        $employees = Employee::all();
        return view("user.modules.report.workday.index",compact("employees"));
    }

    public function permits()
    {
        $employees = Employee::all();
        return view("user.modules.report.permit.index",compact("employees"));
    }

    public function totalHourReport(Request $request)
    {
        $employees = Employee::all();
        return view("user.modules.report.totalHour.index", compact("employees"));
    }
}
