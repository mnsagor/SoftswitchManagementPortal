<?php

namespace App\Http\Requests;

use App\Models\Office;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfficeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('office_edit');
    }

    public function rules()
    {
        return [
            'region_id' => [
                'required',
                'integer',
            ],
            'name'      => [
                'string',
                'required',
                'unique:offices,name,' . request()->route('office')->id,
            ],
            'address'   => [
                'string',
                'nullable',
            ],
            'area'      => [
                'string',
                'nullable',
            ],
            'contact'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
