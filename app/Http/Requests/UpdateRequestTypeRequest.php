<?php

namespace App\Http\Requests;

use App\Models\RequestType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequestTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_type_edit');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:request_types,name,' . request()->route('request_type')->id,
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
