<?php

namespace App\Http\Requests;

use App\Models\TndpImsOltProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTndpImsOltProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tndp_ims_olt_profile_create');
    }

    public function rules()
    {
        return [
            'olt_name_id'   => [
                'required',
                'integer',
            ],
            'date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'job_type_id'   => [
                'required',
                'integer',
            ],
            'device_type'   => [
                'required',
            ],
            'serial_number' => [
                'string',
                'required',
                'unique:tndp_ims_olt_profiles',
            ],
            'interface'     => [
                'string',
                'required',
            ],
            'ip'            => [
                'string',
                'required',
            ],
            'number'        => [
                'string',
                'required',
                'unique:tndp_ims_olt_profiles',
            ],
            'port_number'   => [
                'string',
                'required',
            ],
            'service'       => [
                'required',
            ],
        ];
    }
}
