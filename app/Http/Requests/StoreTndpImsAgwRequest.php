<?php

namespace App\Http\Requests;

use App\Models\TndpImsAgw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTndpImsAgwRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_agw_create');
    }

    public function rules()
    {
        return [
            'ip'        => [
                'string',
                'required',
                'unique:tndp_ims_agws',
            ],
            'name'      => [
                'string',
                'nullable',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
