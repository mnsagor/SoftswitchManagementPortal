<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Emplpyee extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'emplpyees';

    const SEX_RADIO = [
        '1' => 'Male',
        '2' => 'Female',
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

    public static $searchable = [
        'name',
        'mobile',
        'email',
        'payroll_emp',
    ];

    protected $fillable = [
        'name',
        'designation_id',
        'office_id',
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

    public function employeeUsers()
    {
        return $this->hasMany(User::class, 'employee_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
}
