<?php

namespace App\Http\Requests;

use App\Models\JobRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_request_edit');
    }

    public function rules()
    {
        return [
            'network_type_id'     => [
                'required',
                'integer',
            ],
            'job_type_id'         => [
                'required',
                'integer',
            ],
            'request_type_id'     => [
                'required',
                'integer',
            ],
            'request_status_id'   => [
                'required',
                'integer',
            ],
            'number'              => [
                'string',
                'required',
            ],
            'agw_ip'              => [
                'string',
                'required',
            ],
            'tid'                 => [
                'string',
                'required',
            ],
            'call_source_code_id' => [
                'required',
                'integer',
            ],
            'requested_by_id'     => [
                'required',
                'integer',
            ],
            'request_time'        => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'verification_time'   => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'approval_time'       => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'rejection_time'      => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
