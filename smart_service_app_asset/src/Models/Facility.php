<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Facility extends Eloquent
{
    protected $fillable = [
        'facility_id',
        'name',
        'address',
        'phone_number',
        'director_name',
        'director_phone',
        'director_email',
        'status'
    ];

    protected $connection = 'default';
    protected $table = 'facility';
    protected $primaryKey = 'id';

}