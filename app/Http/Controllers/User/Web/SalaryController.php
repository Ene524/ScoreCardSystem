<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SalaryRequest;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
     public function index()
    {
        $salaries = Salary::all();
        return view("user.modules.salary.index.index", compact("salaries"));
    }

    public function create()    {
        return view("user.modules.salary.create-update.index");
    }

    public function store(SalaryRequest $request)
    {
        $salary = new Salary();
        $salary->name = $request->name;
        $salary->description = $request->description;
        $salary->amount = $request->amount;
        $salary->status = $request->status != null ? 1 : 0;
        $salary->save();
        return redirect()->route('user.salary.index')->with('success', 'Maaş başarıyla oluşturuldu');
    }

    public function edit($id)
    {
        $salary = Salary::findOrfail($id);
        return view('user.modules.salary.create-update.index', compact('salary'));
    }

    public function update(SalaryRequest $request, $id)
    {
        $salary = Salary::findOrfail($id);
        $salary->name = $request->name;
        $salary->description = $request->description;
        $salary->amount = $request->amount;
        $salary->status = $request->status != null ? 1 : 0;
        $salary->save();
        return redirect()->route('user.salary.index')->with('success', 'Maaş başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'salaryID' => 'required|exists:salaries,id',
        ]);
        $salary = Salary::find($request->salaryID);
        $salary->delete();
        return response()->json(['status' => 'success']);
    }
}
