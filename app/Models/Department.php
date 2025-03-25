<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Department extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["name"];

    // Department relation with sub-departments
    public function subDepartments()
    {
        return $this->hasMany(SubDepartment::class);
    }

    // Department relation with submission
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('ریاست / آمریت')
        ->setDescriptionForEvent(fn(string $eventName) => "Department has been {$eventName}");
    }
}
