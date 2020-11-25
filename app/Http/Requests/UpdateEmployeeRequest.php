<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'required',
            ],
            'designation_id' => [
                'required',
                'integer',
            ],
            'mobile'         => [
                'string',
                'required',
                'unique:employees,mobile,' . request()->route('employee')->id,
            ],
            'email'          => [
                'required',
                'unique:employees,email,' . request()->route('employee')->id,
            ],
            'sex'            => [
                'required',
            ],
            'payroll_emp'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
