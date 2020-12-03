<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class OsoNumberProfile extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'oso_number_profiles';

    const IS_TD_RADIO = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    const IS_ISD_RADIO = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    const IS_EISD_RADIO = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    const IS_QUEUED_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    const REQUEST_CONTROLLER_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
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
        'oso_agw_ip_id',
        'number_id',
        'oso_number',
        'is_active',
        'is_td',
        'is_isd',
        'is_eisd',
        'is_pbx',
        'pbx_poilot_number',
        'request_controller',
        'is_queued',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function oso_agw_ip()
    {
        return $this->belongsTo(OsoAgw::class, 'oso_agw_ip_id');
    }

    public function number()
    {
        return $this->belongsTo(OsoNumber::class, 'number_id');
    }
}
