<?php

namespace App\Http\Requests;

use App\Models\TndpImsNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTndpImsNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_number_create');
    }

    public function rules()
    {
        return [
            'number'    => [
                'string',
                'required',
                'unique:tndp_ims_numbers',
            ],
            'tid'       => [
                'string',
                'required',
            ],
            'agw_ip_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
