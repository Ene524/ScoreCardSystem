<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchTransactions extends Controller
{
    public function addEmployeeindex()
    {
        return view('user.modules.batchTransactions.addEmployee.index');
    }

    public function addEmployeeUpload(Request $request){

        dd($request->all());

    }
}
