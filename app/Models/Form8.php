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
}
