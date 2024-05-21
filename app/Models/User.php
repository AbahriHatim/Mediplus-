<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRedirectRoute()
    {
        if ($this->hasRole('admin')) {
            return 'admindashboard';
        } elseif ($this->hasRole('patient')) {

            if(auth()->user()->first_time_login){
                return 'patientFirstLog';
            }
            else{return 'patientdashboard';}
        } elseif ($this->hasRole('doctore')) { 
            if(auth()->user()->first_time_login){
                return 'doc';
            }
            else{
            return 'doctordashboard';}

        }
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'idUser');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
    
}