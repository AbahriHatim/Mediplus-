<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $table = 'medicine';
    protected $primaryKey = 'idMedicine';
    public $timestamps = false;
    protected $fillable = [
        'idMedicine',
        'name',
        'form',
        'marketingStatus',
        'approvalDate',
        'price',
        'URI',
    ];
}
