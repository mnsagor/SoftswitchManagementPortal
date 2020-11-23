<?php

namespace App\Http\Requests;

use App\Models\Emplpyee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmplpyeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('emplpyee_edit');
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
                'unique:emplpyees,mobile,' . request()->route('emplpyee')->id,
            ],
            'email'          => [
                'string',
                'required',
                'unique:emplpyees,email,' . request()->route('emplpyee')->id,
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
