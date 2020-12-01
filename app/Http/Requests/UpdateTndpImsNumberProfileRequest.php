<?php

namespace App\Http\Requests;

use App\Models\TndpImsNumberProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTndpImsNumberProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_number_profile_edit');
    }

    public function rules()
    {
        return [
            'tndp_agw_ip_id'    => [
                'required',
                'integer',
            ],
            'number_id'         => [
                'required',
                'integer',
            ],
            'pbx_poilot_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
