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

class OltJobRequest extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    protected $appends = [
        'file',
    ];

    public $table = 'olt_job_requests';

    public static $searchable = [
        'number',
        'interface',
    ];

    const SERVICE_TYPE_SELECT = [
        'data'  => 'Data',
        'voice' => 'Voice',
        'both'  => 'Both',
    ];

    protected $dates = [
        'request_time',
        'verification_time',
        'approval_time',
        'rejection_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'network_type_id',
        'job_type_id',
        'request_type_id',
        'request_status_id',
        'olt_ip_id',
        'number',
        'interface',
        'service_type',
        'port_number',
        'device_ip',
        'note',
        'requested_by_id',
        'request_time',
        'verified_by_id',
        'verification_time',
        'approved_by_id',
        'approval_time',
        'approval_note',
        'rejected_by_id',
        'rejection_time',
        'rejection_note',
        'script',
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

    public function network_type()
    {
        return $this->belongsTo(NetworkType::class, 'network_type_id');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function request_type()
    {
        return $this->belongsTo(RequestType::class, 'request_type_id');
    }

    public function request_status()
    {
        return $this->belongsTo(JobRequestStatus::class, 'request_status_id');
    }

    public function olt_ip()
    {
        return $this->belongsTo(Olt::class, 'olt_ip_id');
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    public function requested_by()
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function getRequestTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setRequestTimeAttribute($value)
    {
        $this->attributes['request_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id');
    }

    public function getVerificationTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setVerificationTimeAttribute($value)
    {
        $this->attributes['verification_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function getApprovalTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setApprovalTimeAttribute($value)
    {
        $this->attributes['approval_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function rejected_by()
    {
        return $this->belongsTo(User::class, 'rejected_by_id');
    }

    public function getRejectionTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setRejectionTimeAttribute($value)
    {
        $this->attributes['rejection_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
