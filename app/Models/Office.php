<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Office extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'offices';

    public static $searchable = [
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
        'region_id',
        'name',
        'is_active',
        'address',
        'area',
        'contact',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function officeOsoAgws()
    {
        return $this->hasMany(OsoAgw::class, 'office_id', 'id');
    }

    public function officeTndpImsAgws()
    {
        return $this->hasMany(TndpImsAgw::class, 'office_id', 'id');
    }

    public function officeUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
