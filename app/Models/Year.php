<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Year extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('سال هجری شمسی')
        ->setDescriptionForEvent(fn(string $eventName) => "HS year has been {$eventName}");
    }
}
