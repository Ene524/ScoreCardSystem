<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            [
                'permits' => Permit::with([
                    'employee'
                ])->whereBetween('start_date', [$request->start_date, $request->end_date])->get()
            ]
        );
    }
}
