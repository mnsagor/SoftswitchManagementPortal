<?php

namespace App\Http\Requests;

use App\Models\TndpImsNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTndpImsNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_number_edit');
    }

    public function rules()
    {
        return [
            'number'    => [
                'string',
                'required',
                'unique:tndp_ims_numbers,number,' . request()->route('tndp_ims_number')->id,
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
