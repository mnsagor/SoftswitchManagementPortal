<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TndpImsNumberProfile extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'tndp_ims_number_profiles';

    const IS_TD_RADIO = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    const IS_ISD_RADIO = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    const IS_EISD_RADIO = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const IS_PBX_RADIO = [
        '1' => 'Master',
        '2' => 'Slave',
        '3' => 'No PBX',
    ];

    protected $fillable = [
        'tndp_agw_ip_id',
        'number_id',
        'is_active',
        'is_td',
        'is_isd',
        'is_eisd',
        'is_pbx',
        'pbx_poilot_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tndp_agw_ip()
    {
        return $this->belongsTo(TndpImsAgw::class, 'tndp_agw_ip_id');
    }

    public function number()
    {
        return $this->belongsTo(TndpImsNumber::class, 'number_id');
    }
}
