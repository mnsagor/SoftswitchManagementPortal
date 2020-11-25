<?php

namespace App\Http\Requests;

use App\Models\TndpImsNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTndpImsNumberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tndp_ims_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tndp_ims_numbers,id',
        ];
    }
}
