<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
/**
 * Class Partner
 * @package App\Models
 * @property $id
 * @property $name
 * @property $description
 * @property $nip_number
 * @property $website
 */
class Partner extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'nip_number',
        'website'
    ];

    protected $auditInclude = [
        'name',
        'description',
        'nip_number',
        'website'
    ];
}
