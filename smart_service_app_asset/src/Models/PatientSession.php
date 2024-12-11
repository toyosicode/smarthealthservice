<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientSession extends Eloquent
{
    protected $fillable = [
        'patient_id',
        'facility_id',
        'vitals_taken',
        'status'
    ];

    protected $connection = 'default';
    protected $table = 'patient_session';
    protected $primaryKey = 'patient_session_id';

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'facility_id');
    }

}