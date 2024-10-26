<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Usable extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "usable_type_id",
        "unit_id",
        "details",
        "total",
        "unit_price",
        "total_price",
        "currency_id",
        'province_id',
        'purchaseYear_id',
        'purchaseMonth_id',
        'purchaseDay_id',
    ];

    // Item relation with usable types
    public function usableType()
    {
        return $this->belongsTo(UsableType::class);
    }

    // Item relation with unit
    public function unit()
    {
        return $this->hasOne(Unit::class);
    }

    // Item relation with currency
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    // Item relation with Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Item relation with Year
    public function year()
    {
        return $this->hasOne(Year::class);
    }

    // Item relation with Year
    public function month()
    {
        return $this->hasOne(Month::class);
    }

    // Item relation with Year
    public function day()
    {
        return $this->hasOne(Day::class);
    }

    // Activity Log Options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('اجناس مصرفی')
        ->setDescriptionForEvent(fn(string $eventName) => "Usable item has been {$eventName}");
    }
}
