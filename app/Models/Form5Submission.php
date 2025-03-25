<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form5Submission extends Model
{
    use HasFactory;

    protected $table = 'form5_submission';
    protected $fillable = [
        'id',
        'form5_id',
        'submission_id'
    ];
}
