<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescription';
    protected $primaryKey = 'idMedicament';
    protected $fillable = [
        'idMedicament',
        'idUser',
        'dosage',
        'startDate',
        'endDate',
    ];
    public function prescription()
    {
        return $this->hasMany(Prescription::class, 'idMedicament', 'idMedicine');
    }
    public function medicine()
    {
        return $this->belongsTo(Medicament::class, 'idMedicament');
    }
    
}
