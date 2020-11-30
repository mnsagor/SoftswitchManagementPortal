<?php

namespace App\Http\Requests;

use App\Models\OltJobRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOltJobRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('olt_job_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:olt_job_requests,id',
        ];
    }
}
