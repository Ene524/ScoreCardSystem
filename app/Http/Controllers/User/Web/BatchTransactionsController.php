<?php

namespace App\Http\Controllers\User\Web;

use App\Models\WorkdayType;
use DateTime;
use DateInterval;
use App\Models\Employee;
use App\Imports\EmployeeImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\User\WorkdayBatchRequest;
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
        $employees = Employee::all();
        $workdayTypes = WorkdayType::all();
        return view('user.modules.batchTransactions.addWorkday.index', compact('employees', 'workdayTypes'));
    }

    public function addWorkday(WorkdayBatchRequest $request)
    {
        $employees = Employee::whereIn('id', $request->employee_id)->get();

        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);

        foreach ($employees as $employee) {
            $current_date = clone $start_date;

            while ($current_date <= $end_date) {
                // Eğer bu günün haftanın pazarı (7) değilse işlemi devam ettirin
                if ($current_date->format('N') != 7) {
                    $start_date_formatted = $current_date->format('Y-m-d').$start_date->format('H:i');
                    $end_date_formatted = $current_date->format('Y-m-d').$end_date->format('H:i');

                    $employee->workdays()->create([
                        'start_date' => $start_date_formatted,
                        'end_date' => $end_date_formatted,
                        'workday_type_id' => $request->workday_type_id,
                        'status' => 1,
                    ]);
                }
                $current_date->add(new DateInterval('P1D'));
            }
        }
        return Redirect::back()->with('success', 'Çalışma günleri başarıyla oluşturuldu');

    }
}
