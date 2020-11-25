<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Employee extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'employees';

    const SEX_RADIO = [
        '1' => 'Male',
        '2' => 'Female',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public static $searchable = [
        'name',
        'email',
        'payroll_emp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'designation_id',
        'mobile',
        'email',
        'sex',
        'payroll_emp',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
