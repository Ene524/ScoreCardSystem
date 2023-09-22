<?php

namespace App\Http\Controllers\Employee\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function login(Request $request){

    }
    public function getWorkdays(Request $request)
    {
        return auth('employee')->user()->id;
        //        return response()->json(
//            [
//                'workdays' => Workday::with([
//                    'employee'
//                ])->whereBetween('start_date', [$request->start_date, $request->end_date])
//                    ->where('employee_id',auth('employee')->user()->id)
//                    ->where('status', '1')
//                    ->get()
//            ]
//        );
    }

//    public function getPermits(Request $request)
//    {
//        return response()->json(
//            [
//                'permits' => Permit::with([
//                    'employee'
//                ])->whereBetween('start_date', [$request->start_date, $request->end_date])
//                    ->where('employee_id', auth()->user()->id)
//                    ->where('status', '1')
//                    ->get()
//            ]
//        );
//    }


}
