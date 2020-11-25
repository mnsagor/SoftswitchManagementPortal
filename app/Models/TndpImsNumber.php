<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TndpImsNumber extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'tndp_ims_numbers';

    public static $searchable = [
        'number',
        'agw_ip',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'number',
        'tid',
        'agw_ip',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function numberTndpImsNumberProfiles()
    {
        return $this->hasMany(TndpImsNumberProfile::class, 'number_id', 'id');
    }
}
