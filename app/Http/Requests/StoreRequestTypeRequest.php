<?php

namespace App\Http\Requests;

use App\Models\RequestType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequestTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_type_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:request_types',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
