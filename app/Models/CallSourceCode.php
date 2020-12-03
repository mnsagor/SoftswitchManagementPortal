<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CallSourceCode extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'call_source_codes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'zone_id',
        'name',
        'code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function callSourceCodeUsers()
    {
        return $this->hasMany(User::class, 'call_source_code_id', 'id');
    }

    public function zone()
    {
        return $this->belongsTo(Office::class, 'zone_id');
    }
}
