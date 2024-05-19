<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    use HasFactory;
    
    protected $table = 'pdf_files';
    protected $fillable = [
        'file_name',
        'file_data',
        'doctor_id',
        'patient_id',
    ];

    // Define the relationship with the doctor
    public function doctor()
    {
        return $this->belongsTo(DetailsDoctor::class, 'doctor_id');
    }

    // Define the relationship with the patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
