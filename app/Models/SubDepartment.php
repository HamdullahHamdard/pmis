<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SubDepartment extends Model
{
    use HasFactory, LogsActivity;

    // Sub-department relation with department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('آمریت / ریاست کوچک')
        ->setDescriptionForEvent(fn(string $eventName) => "Sub-department has been {$eventName}");
    }
}
