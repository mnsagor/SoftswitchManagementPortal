<?php

namespace App\Http\Requests;

use App\Models\Designation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_edit');
    }

    public function rules()
    {
        return [
            'name'  => [
                'string',
                'required',
                'unique:designations,name,' . request()->route('designation')->id,
            ],
            'grade' => [
                'string',
                'required',
            ],
        ];
    }
}
