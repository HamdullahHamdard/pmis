<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SubCategory extends Model
{
    use HasFactory, LogsActivity;

    // Sub-category relation with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('کتگوری کوچک')
        ->setDescriptionForEvent(fn(string $eventName) => "Sub-category has been {$eventName}");
    }
}
