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
        '0' => 'No',
    ];

    const IS_ISD_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const IS_EISD_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const IS_PBX_RADIO = [
        '1' => 'Master',
        '2' => 'Slave',
        '0' => 'No PBX',
    ];

    protected $fillable = [
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

    public function number()
    {
        return $this->belongsTo(OsoNumber::class, 'number_id');
    }
}
