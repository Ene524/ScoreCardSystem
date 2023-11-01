<?php

namespace App\Http\Controllers\User\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\DepartmentRequest;
use App\Interfaces\IDepartmentService;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use HttpResponse;

    private IDepartmentService $departmentService;

    public function __construct(IDepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->getAll();
        return view("user.modules.department.index.index", compact("departments"));
    }

    public function create()
    {
        return view("user.modules.department.create-update.index");
    }

    public function store(DepartmentRequest $request)
    {
        $response = $this->departmentService->create(
            $request->name,
            $request->description,
            $request->status == null ? 0 : 1
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    public function edit($id)
    {
        $response = $this->departmentService->update($id, []);
        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );

//        $department = Department::findOrfail($id);
//        return view('user.modules.department.create-update.index', compact('department'));
    }

    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrfail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->status = $request->status != null ? 1 : 0;
        $department->save();
        return redirect()->route('user.department.index')->with('success', 'Departman başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'departmentID' => 'required|exists:departments,id',
        ]);
        $department = Department::find($request->departmentID);
        $department->delete();
        return response()->json(['status' => 'success']);
    }
}
