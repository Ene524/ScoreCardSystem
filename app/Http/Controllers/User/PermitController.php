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
