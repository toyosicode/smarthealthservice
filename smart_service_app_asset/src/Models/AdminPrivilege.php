<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminPrivilege extends Eloquent
{
    protected $fillable = [
        'admin_code',
        'allowed_pages'
    ];

    protected $connection = 'default';
    protected $table = 'admin_privilege';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    /**
     * The admin for this privilege
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_code', 'admin_code');
    }
}