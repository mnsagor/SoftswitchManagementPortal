<?php

namespace App\Http\Requests;

use App\Models\Emplpyee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmplpyeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('emplpyee_create');
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
            'office_id'      => [
                'required',
                'integer',
            ],
            'mobile'         => [
                'string',
                'required',
                'unique:emplpyees',
            ],
            'email'          => [
                'string',
                'required',
                'unique:emplpyees',
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
