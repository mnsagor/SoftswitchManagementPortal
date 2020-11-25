<?php

namespace App\Http\Requests;

use App\Models\NetworkType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNetworkTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('network_type_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:network_types',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
