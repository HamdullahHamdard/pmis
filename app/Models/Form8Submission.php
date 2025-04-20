<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form8Submission extends Model
{
    /** @use HasFactory<\Database\Factories\Form8SubmissionFactory> */
    use HasFactory;


    protected $fillable = [
        'item_id',
        'form8_id',
        'employee_id',
        'total'
    ];
    public function form8()
    {
        return $this->belongsTo(Form8::class);
    }
}
