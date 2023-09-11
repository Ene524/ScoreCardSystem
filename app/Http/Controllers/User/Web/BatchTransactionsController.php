<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\WorkdayBatchRequest;
use App\Models\Employee;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EmployeeUploadRequest;
use Illuminate\Support\Facades\Redirect;
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
        $employees = Employee::all();
        return view('user.modules.batchTransactions.addWorkday.index', compact('employees'));
    }

    public function addWorkday(WorkdayBatchRequest $request)
    {
        $employees = Employee::whereIn('id', $request->employee_id)->get();

        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);

        foreach ($employees as $employee) {
            $current_date = clone $start_date;

            while ($current_date <= $end_date) {
                if ($current_date->format('N') != 7) {
                    $employee->workdays()->create([
                        'start_date' => $current_date->format('Y-m-d H:i'),
                        'end_date' => $current_date->format('Y-m-d H:i'),
                        'status' => 1,
                    ]);
                }

                $current_date->add(new DateInterval('P1D')); // Bir gün ekleyin
            }
        }
        return Redirect::back()->with('success', 'Çalışma günleri başarıyla oluşturuldu');


    }
}
