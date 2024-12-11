<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Eloquent
{
    protected $fillable = [
        'staff_id',
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'password',
        'role',
        'department_id'
    ];

    protected $connection = 'default';
    protected $table = 'staff';
    protected $primaryKey = 'id';

    /**
     * Get the associated privileges for this admin
     * @return HasMany
     */
    public function admin_privilege(): HasMany
    {
        return $this->hasMany(AdminPrivilege::class, 'admin_code', 'staff_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * Get this admin full name
     * @return string
     */
    public function getfullnameAttribute(): string
    {
        return ucwords("$this->last_name $this->first_name $this->middle_name");
    }

    /**
     * @param $value
     * @return void
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

}