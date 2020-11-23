<?php

namespace App\Http\Requests;

use App\Models\Office;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOfficeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('office_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:offices,id',
        ];
    }
}
