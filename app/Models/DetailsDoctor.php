<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsDoctor extends Model
{
    use HasFactory;

    protected $table = 'details_doctors';
  
    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
    
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
