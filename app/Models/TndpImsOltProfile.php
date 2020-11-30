<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class TndpImsOltProfile extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'tndp_ims_olt_profiles';

    public static $searchable = [
        'serial_number',
        'number',
    ];

    const DEVICE_TYPE_SELECT = [
        'mdu' => 'MDU',
        'ont' => 'ONT',
    ];

    const NO_OF_PORTS_SELECT = [
        '1'  => '1',
        '16' => '16',
        '24' => '24',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const SERVICE_SELECT = [
        'both'  => 'Both',
        'data'  => 'Data',
        'voice' => 'Voice',
    ];

    protected $fillable = [
        'olt_name_id',
        'date',
        'job_type_id',
        'device_type',
        'no_of_ports',
        'serial_number',
        'interface',
        'ip',
        'number',
        'port_number',
        'service',
        'status_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function olt_name()
    {
        return $this->belongsTo(Olt::class, 'olt_name_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function status()
    {
        return $this->belongsTo(JobRequestStatus::class, 'status_id');
    }
}
