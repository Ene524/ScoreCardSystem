<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;
use App\Models\Permit;

class DashboardController extends Controller
{
    public function index()
    {
        $lastPermits = Permit::where('employee_id', auth()->user()->id)
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('employee.modules.dashboard.index.index', compact('lastPermits'));
    }
}
