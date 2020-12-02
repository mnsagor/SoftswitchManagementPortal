<?php

namespace App\Http\Requests;

use App\Models\OsoNumberProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOsoNumberProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_number_profile_edit');
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
            'oso_number'        => [
                'string',
                'nullable',
            ],
            'pbx_poilot_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
