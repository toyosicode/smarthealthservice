<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Eloquent
{
    protected $fillable = [
        'department_id',
        'department_name',
        'facility_id'
    ];

    protected $connection = 'default';
    protected $table = 'department';
    protected $primaryKey = 'department_id';

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'facility_id');
    }

}