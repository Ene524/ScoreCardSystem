<?php

namespace App\Http\Controllers\User;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('user.department.index',compact('departments'));
    }

    public function create()
    {
        return view('user.department.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('user.department.show');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
