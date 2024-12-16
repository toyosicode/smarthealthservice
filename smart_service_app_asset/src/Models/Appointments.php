<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Appointments extends Eloquent
{
    protected $fillable = [
        'appointment_id',
        'patient_session_id',
        'doctor_id',
        'appointment_time',
        'status'
    ];

    protected $connection = 'default';
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';

}