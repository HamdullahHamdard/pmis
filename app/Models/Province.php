<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Province extends Model
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
        return LogOptions::defaults()->useLogName('ولایت')
        ->setDescriptionForEvent(fn(string $eventName) => "Province has been {$eventName}");
    }
}
