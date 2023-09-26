<?php

namespace App\Http\Controllers\User\Web;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Salary;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        $positions = Position::all();
        $salaries = Salary::all();
        $employees = Employee::with(['department', 'position', 'salary', 'user'])
            ->fullName($request->full_name)
            ->email($request->email)
            ->department($request->department_id)
            ->position($request->position_id)
            ->salary($request->salary_id)
            ->status($request->status)
            ->paginate(10);
        return view("user.modules.employee.index.index", compact("employees", "departments", "positions", "salaries"));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $salaries = Salary::all();
        return view("user.modules.employee.create-update.index", compact("departments", "positions", "salaries"));
    }

    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->password = \Hash::make($request->password);
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->salary_id = $request->salary_id;
        $employee->employment_date = $request->employment_date;
        $employee->save();
        return redirect()->route('user.employee.index')->with('success', 'Personel başarıyla oluşturuldu');
    }

    public function edit($id)
    {
        $departments = Department::all();
        $positions = Position::all();
        $salaries = Salary::all();
        $employee = Employee::findOrfail($id);
        return view('user.modules.employee.create-update.index', compact('employee', 'departments', 'positions', 'salaries'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrfail($id);
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->password = \Hash::make($request->password);
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->salary_id = $request->salary_id;
        $employee->employment_date = $request->employment_date;
        $employee->save();
        return redirect()->route('user.employee.index')->with('success', 'Personel başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'employeeID' => 'required|exists:employees,id',
        ]);
        $employee = Employee::find($request->employeeID);
        $employee->delete();
        return response()->json(['status' => 'success']);
    }

    public function export()
    {
        return Excel::download(new EmployeeExport(), 'Personeller.xlsx');
    }
}
