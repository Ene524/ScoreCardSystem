<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            [
                'workdays' => Workday::with([
                    'employee'
                ])->whereBetween('start_date', [$request->start_date, $request->end_date])->get()
            ]
        );
    }
}
