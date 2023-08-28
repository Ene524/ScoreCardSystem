<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WorkdayRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = Workday::with(['employee'])->get();
        return view("user.modules.workday.index.index",compact("workdays"));
    }

    public function index2()
    {
        $employees = Employee::all();
        $permitTypes = PermitType::all();
        $permits = Permit::with(['employee'])->get();

        $events = [];
        foreach ($permits as $permit) {
            $events[] = [
                'title' => $permit->employee->full_name,
                'start' => $permit->start,
                'end' => $permit->end,
                'color' => '#f05050',
            ];
        }
        return view("user.modules.workday.calendar.index",compact("events","employees","permitTypes"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view("user.modules.workday.create-update.index", compact(  "employees"));
    }

    public function store(WorkdayRequest $request)
    {
        $workday = new Workday();
        $workday->employee_id = $request->employee_id;
        $workday->start_date = $request->start_date;
        $workday->end_date = $request->end_date;
        $workday->status = $request->status;
        $workday->save();
        return redirect()->route('user.workday.index')->with('success', 'Çalışma günü başarıyla eklendi');
    }

    public function edit($id)
    {
        $workday = Workday::findOrFail($id);
        $employees = Employee::all();
        return view("user.modules.workday.create-update.index", compact("workday", "employees"));
    }

    public function update(WorkdayRequest $request, $id)
    {
        $workday = Workday::findOrFail($id);
        $workday->employee_id = $request->employee_id;
        $workday->start_date = $request->start_date;
        $workday->end_date = $request->end_date;
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
}

