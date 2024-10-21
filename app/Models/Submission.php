<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Submission extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "employee_id",
        "item_id",
        "total",
        "details",
        "province_id",
        "is_returned",
    ];

    protected $casts = [
        "created_at" => "datetime",
    ];

    // Submission relation with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id");
    }

    // Submission relation with Province
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Submission relation with Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('تسلیمی')
        ->setDescriptionForEvent(fn(string $eventName) => "Submission has been {$eventName}");
    }
}
