<?php

namespace App\Http\Controllers\User\Web;

use App\Exports\WorkdayExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\WorkdayRequest;
use App\Models\Employee;
use App\Models\PermitType;
use App\Models\Workday;
use App\Models\WorkdayType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkdayController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();
        $workdays = Workday::with(['employee', 'workdayType'])
            ->employee($request->employee_id)
            ->workdayType($request->workday_type_id)
            ->StartDateAndEndDate($request->start_date, $request->end_date)
            ->paginate(10);
        return view("user.modules.workday.index.index", compact("workdays", "employees", "workdayTypes"));
    }

    public function index2()
    {
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();

        return view("user.modules.workday.calendar.index", compact("employees", "workdayTypes"));
    }

    public function create()
    {
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();
        return view("user.modules.workday.create-update.index", compact("employees", "workdayTypes"));
    }

    public function store(WorkdayRequest $request)
    {
        $workday = new Workday();
        $workday->employee_id = $request->employee_id;
        $workday->start_date = $request->start_date;
        $workday->end_date = $request->end_date;
        $workday->workday_type_id = $request->workday_type_id;
        $workday->status = $request->status;
        $workday->save();
        return redirect()->route('user.workday.index')->with('success', 'Çalışma günü başarıyla eklendi');
    }

    public function edit($id)
    {
        $workday = Workday::findOrFail($id);
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();
        return view("user.modules.workday.create-update.index", compact("workday", "employees", "workdayTypes"));
    }

    public function update(WorkdayRequest $request, $id)
    {
        $workday = Workday::findOrFail($id);
        $workday->employee_id = $request->employee_id;
        $workday->start_date = $request->start_date;
        $workday->end_date = $request->end_date;
        $workday->workday_type_id = $request->workday_type_id;
        $workday->status = $request->status;
        $workday->save();
        return redirect()->route('user.workday.index')->with('success', 'Çalışma günü başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $workday = Workday::findOrFail($request->workdayID);
        $workday->delete();
        return response()->json(['status' => 'success']);
    }

    public function report(Request $request)
    {
        $employees = Employee::all();
        return view("user.modules.workday.report.index", compact("employees"));
    }

    public function export(Request $request)
    {
        return Excel::download(new WorkdayExport(), 'Çalışma Günleri.xlsx');
    }
}
