<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        return view('user.modules.dashboard.index.index', compact('employeeCount'));
    }
}
