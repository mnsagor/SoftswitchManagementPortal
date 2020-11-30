<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Olt extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'olts';

    public static $searchable = [
        'name',
        'ip',
        'vlan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'ip',
        'vlan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function oltNameTndpImsOltProfiles()
    {
        return $this->hasMany(TndpImsOltProfile::class, 'olt_name_id', 'id');
    }

    public function oltIpOltJobRequests()
    {
        return $this->hasMany(OltJobRequest::class, 'olt_ip_id', 'id');
    }
}
