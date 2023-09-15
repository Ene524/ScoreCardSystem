<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('employee.modules.dashboard.index.index');
    }
}
