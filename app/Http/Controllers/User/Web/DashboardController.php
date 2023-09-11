<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        return view('user.modules.dashboard.index.index', compact('employeeCount'));
        //Test
    }
}
