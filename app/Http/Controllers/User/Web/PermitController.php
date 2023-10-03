<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PermitController extends Controller
{
    public function index()
    {
        $permits = DB::select("SELECT
        permits.id,
        employees.full_name,
        DATE_FORMAT(permits.start_date,'%d.%m.%Y %H:%i') AS start_date,
        DATE_FORMAT(permits.end_date,'%d.%m.%Y %H:%i') AS end_date,
        permit_types.name,
        (TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15) permitsTime,
        permits.description,
        permits.status
         FROM permits
        LEFT JOIN employees ON permits.employee_id=employees.id
        LEFT JOIN permit_types ON permits.permit_type_id=permit_types.id
        LEFT JOIN permit_statuses ON permits.permit_status_id=permit_statuses.id
        WHERE permits.status=1");

        return view('user.modules.permit.index.index', compact('permits'));
    }

    public function index2()
    {
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        $permitStatuses = PermitStatus::all();

        return view("user.modules.permit.calendar.index", compact("employees", "permitTypes", "permitStatuses"));
    }

    public function create()
    {
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        return view('user.modules.permit.create-update.index', compact('employees', 'permitTypes'));
    }

    public function store(PermitRequest $request)
    {
        $permit = new Permit();
        $permit->employee_id = $request->employee_id;
        $permit->start_date = $request->start_date;
        $permit->end_date = $request->end_date;
        $permit->permit_type_id = $request->permit_type_id;
        $permit->description = $request->description;
        $permit->permit_status_id = $request->permit_status_id;
        $permit->save();
        return redirect()->route('user.permit.index')->with('success', 'İzin başarıyla oluşturuldu');

    }

    public function edit($id)
    {
        $permit = Permit::findOrfail($id);
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        return view('user.modules.permit.create-update.index', compact('permit', 'employees', 'permitTypes'));
    }

    public function update(PermitRequest $request, $id)
    {
        $permit = Permit::findOrfail($id);
        $permit->employee_id = $request->employee_id;
        $permit->start_date = $request->start_date;
        $permit->end_date = $request->end_date;
        $permit->permit_type_id = $request->permit_type_id;
        $permit->description = $request->description;
        $permit->permit_status_id = $request->permit_status_id;
        $permit->save();
        return redirect()->route('user.permit.index')->with('success', 'İzin başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $permit = Permit::findOrFail($request->permitID);
        $permit->delete();
        return response()->json(['status' => 'success']);
    }
}
