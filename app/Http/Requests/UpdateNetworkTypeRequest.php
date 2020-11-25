<?php

namespace App\Http\Requests;

use App\Models\NetworkType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNetworkTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('network_type_edit');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:network_types,name,' . request()->route('network_type')->id,
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
