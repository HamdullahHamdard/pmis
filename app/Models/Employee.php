<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "employment_id",
        "position",
        "employee_type_id",
        "employee_shift_id",
        "province_id",
        "contact",
    ];

    // Employee relation with type
    public function employeeType()
    {
        return $this->hasOne(EmployeeType::class);
    }

    // Employee relation with shift
    public function employeeShift()
    {
        return $this->hasOne(EmployeeShift::class);
    }

    // Employee relation with province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Employee relation with submissions
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('کارمند اداره')
        ->setDescriptionForEvent(fn(string $eventName) => "Employee has been {$eventName}");
    }
}
