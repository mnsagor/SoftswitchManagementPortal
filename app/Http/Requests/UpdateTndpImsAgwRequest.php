<?php

namespace App\Http\Requests;

use App\Models\TndpImsAgw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTndpImsAgwRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_agw_edit');
    }

    public function rules()
    {
        return [
            'ip'        => [
                'string',
                'required',
                'unique:tndp_ims_agws,ip,' . request()->route('tndp_ims_agw')->id,
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
