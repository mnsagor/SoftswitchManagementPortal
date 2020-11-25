<?php

namespace App\Http\Requests;

use App\Models\JobRequestStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJobRequestStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_request_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:job_request_statuses,id',
        ];
    }
}
