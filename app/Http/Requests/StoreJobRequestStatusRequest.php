<?php

namespace App\Http\Requests;

use App\Models\JobRequestStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobRequestStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_request_status_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:job_request_statuses',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
