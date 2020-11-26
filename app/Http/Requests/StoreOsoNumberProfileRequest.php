<?php

namespace App\Http\Requests;

use App\Models\OsoNumberProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOsoNumberProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_number_profile_create');
    }

    public function rules()
    {
        return [
            'oso_agw_ip_id'     => [
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
