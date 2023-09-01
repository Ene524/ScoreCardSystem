<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WorkdayRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Workday;
use App\Services\WorkdayService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WorkdayController extends Controller
{
    public function __construct(WorkdayService $workdayService)
    {
        $this->workdayService = $workdayService;
    }

    public function index()
    {
        //$tempEmployees = Employee::where('id', '=', 1)->get()->toArray();
        //$this->workdayService->addWorkdaysForUsers('2023-09-01', '2023-09-30', $tempEmployees);
        $workdays = Workday::with(['employee'])->get();
        return view("user.modules.workday.index.index", compact("workdays"));
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
        return view("user.modules.workday.calendar.index", compact("events", "employees", "permitTypes"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view("user.modules.workday.create-update.index", compact("employees"));
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

    public function addWorkdays(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $employees = Employee::all(); // Tüm kullanıcılar
        $this->workdayService->addWorkdaysForUsers($startDate, $endDate, $employees);

        return response()->json(['message' => 'Workdays added successfully'], 201);
    }

    public function report(Request $request)
    {
//        $employees = Employee::all();
//        $userId = 1;
//        $startDate = '2023-01-01 00:00:00';
//        $endDate = '2023-12-31 23:59:59';
//
//
//        $workdays = DB::table('workdays')
//            ->select('start_date', 'end_date')
//            ->where('employee_id', $userId)
//            ->whereBetween('start_date', [$startDate, $endDate])
//            ->where('status', 1)
//            ->get();
//
//
//        $totalWorkingHours = 0;
//
//        foreach ($workdays as $workday) {
//            $startTime = strtotime($workday->start_date);
//            $endTime = strtotime($workday->end_date);
//            $workingHours = ($endTime - $startTime) / 3600; // Saat cinsinden çalışma süresi
//            $totalWorkingHours += $workingHours;
//        }


        $reports = Employee::select('full_name')
            ->addSelect(DB::raw('(FLOOR(TIMESTAMPDIFF(hour, end_date, start_date) / 24) * 15)-TIMESTAMPDIFF(hour, end_date, start_date)  AS permitHours'))
            ->leftJoin('permits', 'employees.id', '=', 'permits.employee_id')
            ->groupBy('full_name')
            ->get();



        return view("user.modules.workday.report.index", compact( "reports"));
    }
}

