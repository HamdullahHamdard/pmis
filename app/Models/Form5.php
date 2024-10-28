<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Form5 extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'distribution_no',
        'distribution_date',
        'details',
        'form9s_id',
    ];


    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function form9s(): BelongsTo
    {
        return $this->belongsTo(Form9::class);
    }

    public function form8(): BelongsTo
    {
        return $this->belongsTo(Form8::class);
    }
    public function submissions()
    {
        return $this->belongsToMany(Submission::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('فورم ف س ۵')
            ->setDescriptionForEvent(fn(string $eventName) => "Form 5 has been {$eventName}");
    }
}
