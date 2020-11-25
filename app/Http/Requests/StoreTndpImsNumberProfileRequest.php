<?php

namespace App\Http\Requests;

use App\Models\TndpImsNumberProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTndpImsNumberProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_number_profile_create');
    }

    public function rules()
    {
        return [
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
