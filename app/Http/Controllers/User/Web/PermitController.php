<?php

namespace App\Http\Controllers\User\Web;

use App\Exports\PermitExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class PermitController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        $permitStatuses = PermitStatus::all();
        $permits=Permit::with('employee','permitType','permitStatus')
           ->select('id','employee_id','start_date','end_date','permit_type_id','description','permit_status_id')
            ->selectRaw('(TIMESTAMPDIFF(hour, start_date,end_date)) - (FLOOR(TIMESTAMPDIFF(hour, start_date,end_date) / 24) * 15) permitsTime')
            ->Employee(request('employee_id'))
            ->PermitType(request('permit_type_id'))
            ->PermitStatus(request('permit_status_id'))
            ->StartDateAndEndDate(request('start_date'), request('end_date'))
            ->description(request('description'))
            ->paginate(10);
//
        return view('user.modules.permit.index.index', compact('permits', 'employees', 'permitTypes', 'permitStatuses'));
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
        $permitStatuses = PermitStatus::all();
        return view('user.modules.permit.create-update.index', compact('employees', 'permitTypes', 'permitStatuses'));
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
        $permitStatuses = PermitStatus::all();
        return view('user.modules.permit.create-update.index', compact('permit', 'employees', 'permitTypes', 'permitStatuses'));
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

    public function export(Request $request)
    {
        return Excel::download(new PermitExport(), 'İzin Günleri.xlsx');
    }
}
