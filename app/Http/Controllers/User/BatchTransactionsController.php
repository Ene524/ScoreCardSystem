<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EmployeeUploadRequest;
use Maatwebsite\Excel\Facades\Excel;

class BatchTransactionsController extends Controller
{
    public function addEmployeeindex()
    {
        return view('user.modules.batchTransactions.addEmployee.index');
    }

    public function addEmployeeUpload(EmployeeUploadRequest $request)
    {
        Excel::import(new EmployeeImport(), $request->file('excelFile'));
        return redirect()->back()->with('success', 'Müşteriler başarıyla aktarıldı');
    }


    public function addWorkdayindex()
    {
        return view('user.modules.batchTransactions.addWorkday.index');
    }
}
