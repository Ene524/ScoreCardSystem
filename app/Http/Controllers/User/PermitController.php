<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitRequest;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index()
    {
        return view('user.permit.index');
    }

    public function create()
    {
        return view('user.permit.create');
    }

    public function store(PermitRequest $request)
    {
        //dd($request->all());
        $permit = new Permit();
        $permit->employee_id = $request->employee_id;
        $permit->start = $request->start;
        $permit->end = $request->end;
        $permit->permit_type_id = $request->permit_type_id;
        $permit->description = $request->description;
        $permit->permit_status_id = 0;
        $permit->save(); //Test

        $lastPermit = Permit::latest()->with(['employee'])->first();
        return response()->json([$lastPermit]);
    }


}
