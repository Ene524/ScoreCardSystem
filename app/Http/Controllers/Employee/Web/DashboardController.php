<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {


        return view('employee.modules.dashboard.index.index' );
    }
}
