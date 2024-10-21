<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Form9 extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'department_id',
        'employee_id',
        'requested_management',
        'form_date',
        'form9s_number',
        'first_details',
        'second_details',
        'manager_name',
        'is_accepted',
        'status',
    ];

    public function department () : HasOne
    {
        return $this->hasOne(Department::class);
    }

    public function employee () : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    public function form5 () : HasOne
    {
        return $this->hasOne(Form5::class);
    }


    public function items() {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('استفاده کننده سیستم')
            ->setDescriptionForEvent(fn (string $eventName) => "Form9 has been {$eventName}");
    }
}
