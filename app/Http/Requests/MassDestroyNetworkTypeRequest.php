<?php

namespace App\Http\Requests;

use App\Models\NetworkType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNetworkTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('network_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:network_types,id',
        ];
    }
}
