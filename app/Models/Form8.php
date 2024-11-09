<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form8 extends Model
{
    /** @use HasFactory<\Database\Factories\Form8Factory> */
    use HasFactory;

    protected $fillable = [
        'form8_number',
        'trusted',
        'form5_id',
        'purchaseYear_id',
        'purchaseMonth_id',
        'purchaseDay_id',
    ];


    // Form relation with form5
    public function form5()
    {
        return $this->hasOne(Form5::class);
    }

    // Form relation with Year
    public function year()
    {
        return $this->hasOne(Year::class);
    }

    // Form relation with Year
    public function month()
    {
        return $this->hasOne(Month::class);
    }

    // Form relation with Year
    public function day()
    {
        return $this->hasOne(Day::class);
    }
}
