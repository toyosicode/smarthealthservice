<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Eloquent
{
    protected $fillable = [
        'nin',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'address',
        'phone_number',
        'enrolment_facility_id',
        'email',
        'genotype',
        'blood_group',
        'next_of_kin_name',
        'next_of_kin_phone',
        'next_of_kin_address'
    ];

    protected $connection = 'default';
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'enrolment_facility_id', 'facility_id');
    }


}