<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Workday;
use Illuminate\Support\Carbon;

class WorkdayController extends Controller
{
    public function index()
    {
        if (Workday::count() == 0) {
            $this->insert();
        }
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
        //        $events = [];
//        foreach ($workdays as $workday) {
//            $events[] = [
//                'title' => $workday->employee->full_name,
//                'start' => $workday->date,
//                'color' => '#f05050',
//            ];
//        }

        //dd($events);

        return view("user.modules.workday.calendar.index",compact("events","employees","permitTypes"));
    }


    public function insert()
    {
        for ($i = 0; $i < 30; $i++) {
            $workday = new Workday();
            $workday->employee_id = 1;
            $workday->date = Carbon::now()->startOfMonth()->addDays($i);
            $workday->start = "09:00";
            $workday->end = "18:00";
            $workday->save();
        }
    }

    public function create()
    {
        $employees = Employee::all();
        return view("user.modules.workday.create-update.index", compact(  "employees"));
    }

    public function store()
    {
        $workday = new Workday();
        $workday->employee_id = request()->employee_id;
        $workday->date = request()->date;
        $workday->start = request()->start;
        $workday->end = request()->end;
        $workday->save();
        return redirect()->route("user.workday.index",with("success","Çalışma günü başarıyla oluşturuldu"));
    }
}

