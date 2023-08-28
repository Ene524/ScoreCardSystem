<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitType;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index()
    {
        $permits=Permit::all();
        $employees=Employee::all();
        $permitTypes=PermitType::all();
        return view('user.modules.permit.index.index',compact('permits','employees','permitTypes'));
    }

    public function create()
    {
        $employees=Employee::all();
        $permitTypes=PermitType::all();
        return view('user.modules.permit.create-update.index',compact('employees','permitTypes'));
    }

    public function store(PermitRequest $request)
    {
        $permit = new Permit();
        $permit->employee_id = $request->employee_id;
        $permit->start_date = $request->start_date;
        $permit->end_date = $request->end_date;
        $permit->permit_type_id = $request->permit_type_id;
        $permit->description = $request->description;
        $permit->permit_status_id = 0;
        $permit->save();


        return response()->json([
            'success' => true,
            'message' => 'İzin başarıyla kaydedildi.'
        ]);
    }


}
