<?php

namespace App\Http\Requests;

use App\Models\JobRequestStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobRequestStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_request_status_edit');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:job_request_statuses,name,' . request()->route('job_request_status')->id,
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
