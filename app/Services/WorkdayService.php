<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Workday;

class WorkdayService
{
    public function addWorkdaysForUsers($startDate, $endDate, $employees = [])
    {
        $currentDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        while ($currentDate <= $endDate) {
            $dayOfWeek = $currentDate->dayOfWeek; // Haftanın günü (0 = Pazartesi, 6 = Pazar)

            if ($dayOfWeek !== 0) { // Pazar günü değilse
                foreach ((array)$employees as $employee) {
                    $workday = new Workday([
                        'employee_id' => $employee['id'],
                        'start_date' => $currentDate->format('Y-m-d 09:00'),
                        'end_date' => $currentDate->format('Y-m-d 18:00'),
                        'workday_status_id' => 1,
                    ]);
                    $workday->save();
                }
            }

            $currentDate->addDay();
        }
    }
}
