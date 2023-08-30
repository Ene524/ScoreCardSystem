<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitRequest;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\PermitType;
use Carbon\Carbon;

class PermitController extends Controller
{
    public function index()
    {
        $permits = Permit::all();
        $employees = Employee::all();
        $permitTypes = PermitType::all();

        $hoursDifferences = [];

        foreach ($permits as $permit) {
            $startDate = Carbon::parse($permit->start_date);
            $endDate = Carbon::parse($permit->end_date);

            $hoursDifference = 0;
            $currentDate = $startDate;

            while ($currentDate < $endDate) {
                if ($currentDate->dayOfWeek !== Carbon::SUNDAY) {
                    $hoursDifference += $currentDate->diffInHours($currentDate->copy()->endOfDay());
                }

                $currentDate->addDay();
            }

            $hoursDifference += $startDate->diffInHours($endDate);

            $hoursDifferences[$permit->id] = $hoursDifference;
        }


        return view('user.modules.permit.index.index', compact('permits', 'employees', 'permitTypes', 'hoursDifferences'));
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
        $permit=Permit::findOrfail($id);
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

    public function delete($id)
    {
        $permit = Permit::findOrfail($id);
        $permit->delete();
        return redirect()->route('user.permit.index')->with('success', 'İzin başarıyla silindi');
    }


}
