<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permit extends Model
{
    use HasFactory,SoftDeletes;

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

    public function permitType()
    {
        return $this->belongsTo(PermitType::class);
    }

    public function permitStatus()
    {
        return $this->belongsTo(PermitStatus::class);
    }

    public function scopeEmployee($query, $employee_id)
    {
        if ($employee_id) {
            return $query->where('employee_id', $employee_id);
        }
    }

    public function scopePermitType($query, $permit_type_id)
    {
        if ($permit_type_id) {
            return $query->where('permit_type_id', $permit_type_id);
        }
    }

    public function scopePermitStatus($query, $permit_status_id)
    {
        if ($permit_status_id) {
            return $query->where('permit_status_id', $permit_status_id);
        }
    }

    public function scopeStartDateAndEndDate($query, $start_date, $end_date)
    {
        if ($start_date && $end_date) {
            return $query->whereBetween('start_date', [$start_date, $end_date])
                ->whereBetween('end_date', [$start_date, $end_date]);
        }
    }

    public function scopeDescription($query, $description)
    {
        if ($description) {
            return $query->where('description', 'LIKE', '%' . $description . '%');
        }
    }
}


