<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class JobType extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'job_types';

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '2' => 'Inactive',
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

    public function jobTypeJobRequests()
    {
        return $this->hasMany(JobRequest::class, 'job_type_id', 'id');
    }

    public function jobTypeTndpImsOltProfiles()
    {
        return $this->hasMany(TndpImsOltProfile::class, 'job_type_id', 'id');
    }

    public function jobTypeOltJobRequests()
    {
        return $this->hasMany(OltJobRequest::class, 'job_type_id', 'id');
    }
}
