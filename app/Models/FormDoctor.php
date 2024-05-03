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
        'patient_name',
        'date_of_birth',
        'gender',
        'address',
        'symptoms',
        'diagnosis',
        'treatment_plan',
        'prescription',
        'doctor_id'
    ];
    public function doctor()
    {
        return $this->belongsTo(DetailsDoctor::class, 'doctor_id');
    }
    
    
    
}
