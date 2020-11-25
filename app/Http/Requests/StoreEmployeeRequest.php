<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_create');
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
                'unique:employees',
            ],
            'email'          => [
                'required',
                'unique:employees',
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
