<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class NetworkType extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'network_types';

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function networkTypeJobRequests()
    {
        return $this->hasMany(JobRequest::class, 'network_type_id', 'id');
    }

    public function networkTypeOltJobRequests()
    {
        return $this->hasMany(OltJobRequest::class, 'network_type_id', 'id');
    }
}
