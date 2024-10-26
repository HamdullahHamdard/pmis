<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class UsableSubmission extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "department_id",
        "item_id",
        "total",
        "usable_type_id",
        'province_id'
    ];

    // Usable submission relation with department
    public function department()
    {
        return $this->belongsTo(Department::class, "department_id");
    }

    // Usable submission relation with usable
    public function usable()
    {
        return $this->belongsTo(Usable::class);
    }

    // Usable submission relation with usable-type
    public function usableType()
    {
        return $this->belongsTo(UsableType::class, "usable_type_id");
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('تسلیمی جنس مصرفی')
        ->setDescriptionForEvent(fn(string $eventName) => "Usable item submission has been {$eventName}");
    }
}
