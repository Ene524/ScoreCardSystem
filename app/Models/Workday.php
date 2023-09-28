<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workday extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function workdayType()
    {
        return $this->belongsTo(WorkdayType::class);
    }

    public function scopeEmployee($query, $employee_id)
    {
        if ($employee_id) {
            return $query->where('employee_id', $employee_id);
        }
    }

    public function scopeWorkdayType($query, $workday_type_id)
    {
        if ($workday_type_id) {
            return $query->where('workday_type_id', $workday_type_id);
        }
    }

    public function scopeStatus($query, $status)
    {
        if ($status)
            return $query->where('status', $status);
    }

    public function scopeStartDateAndEndDate($query, $start_date, $end_date)
    {
        if ($start_date && $end_date) {
            return $query->whereBetween('start_date', [$start_date, $end_date])->orWhereBetween('end_date', [$start_date, $end_date]);
        }
    }

}
