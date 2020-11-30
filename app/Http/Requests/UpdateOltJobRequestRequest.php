<?php

namespace App\Http\Requests;

use App\Models\OltJobRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOltJobRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('olt_job_request_edit');
    }

    public function rules()
    {
        return [
            'network_type_id'   => [
                'required',
                'integer',
            ],
            'job_type_id'       => [
                'required',
                'integer',
            ],
            'request_type_id'   => [
                'required',
                'integer',
            ],
            'request_status_id' => [
                'required',
                'integer',
            ],
            'olt_ip_id'         => [
                'required',
                'integer',
            ],
            'number'            => [
                'string',
                'required',
                'unique:olt_job_requests,number,' . request()->route('olt_job_request')->id,
            ],
            'interface'         => [
                'string',
                'required',
            ],
            'service_type'      => [
                'required',
            ],
            'port_number'       => [
                'string',
                'required',
            ],
            'device_ip'         => [
                'string',
                'nullable',
            ],
            'requested_by_id'   => [
                'required',
                'integer',
            ],
            'request_time'      => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'verification_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'approval_time'     => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'rejection_time'    => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
