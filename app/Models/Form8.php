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
        return $this->belongsTo(Form5::class, 'form5_id');
    }


    public function day()
    {
        return $this->belongsTo(Day::class, 'purchaseDay_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class, 'purchaseMonth_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'purchaseYear_id');
    }

}
