<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'total',
        'unit_id',
        'm7number',
        'details',
        'in_stock',
        'category_id',
        'purchase_price',
        'currency_id',
        'item_stock_number',
        'province_id',
        'purchaseYear_id',
        'purchaseMonth_id',
        'purchaseDay_id',
        'images'
    ];

    // Item relation with Unit
    public function unit()
    {
        return $this->hasOne(Unit::class);
    }

    // Item relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Item relation with Currency
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
        return LogOptions::defaults()->useLogName('جنس اداره')
        ->setDescriptionForEvent(fn(string $eventName) => "Item has been {$eventName}");
    }
}
