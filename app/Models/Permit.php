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
}


