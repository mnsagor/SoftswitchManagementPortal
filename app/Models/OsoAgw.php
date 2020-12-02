<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class OsoAgw extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'oso_agws';

    public static $searchable = [
        'ip',
        'name',
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

    protected $fillable = [
        'ip',
        'name',
        'office_id',
        'is_active',
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

    public function agwIpOsoNumbers()
    {
        return $this->hasMany(OsoNumber::class, 'agw_ip_id', 'id');
    }

    public function osoAgwIpOsoNumberProfiles()
    {
        return $this->hasMany(OsoNumberProfile::class, 'oso_agw_ip_id', 'id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
}
