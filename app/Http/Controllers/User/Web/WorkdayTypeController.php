<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WorkdayTypeRequest;
use App\Models\WorkdayType;
use Illuminate\Http\Request;

class WorkdayTypeController extends Controller
{
    public function index()
    {
        $workdayTypes = WorkdayType::all();
        return view("user.modules.workdayType.index.index", compact("workdayTypes"));
    }

    public function create()    {
        return view("user.modules.workdayType.create-update.index");
    }

    public function store(WorkdayTypeRequest $request)
    {
        $workdayType = new WorkdayType();
        $workdayType->name = $request->name;
        $workdayType->description = $request->description;
        $workdayType->hourly_wage = $request->hourly_wage;
        $workdayType->status = $request->status != null ? 1 : 0;
        $workdayType->save();
        return redirect()->route('user.workdayType.index')->with('success', 'Maaş başarıyla oluşturuldu');
    }

    public function edit($id)
    {
        $workdayType = WorkdayType::findOrfail($id);
        return view('user.modules.workdayType.create-update.index', compact('workdayType'));
    }

    public function update(WorkdayTypeRequest $request, $id)
    {
        $workdayType = WorkdayType::findOrfail($id);
        $workdayType->name = $request->name;
        $workdayType->description = $request->description;
        $workdayType->hourly_wage = $request->hourly_wage;
        $workdayType->status = $request->status != null ? 1 : 0;
        $workdayType->save();
        return redirect()->route('user.workdayType.index')->with('success', 'Maaş başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'workdayTypeID' => 'required|exists:workday_types,id'
        ]);
        $workdayType = WorkdayType::find($request->workdayTypeID);
        $workdayType->delete();
        return response()->json(['status' => 'success']);
    }
}
