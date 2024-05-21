<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPatient extends Model
{
    use HasFactory;
    protected $table = 'details_patients';

    protected $fillable = [
     
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'user_id',
    ];

   
}
