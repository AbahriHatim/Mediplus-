<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDoctor extends Model
{
    use HasFactory;
    protected $table = 'medical_forms';

    protected $fillable = [
        'patient_id', // Add patient_id to the fillable array
        'symptoms',
        'diagnosis',
        'treatment_plan',
        'prescription',
    ];
}
