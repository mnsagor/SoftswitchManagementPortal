<?php

namespace App\Http\Requests;

use App\Models\OsoAgw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOsoAgwRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('oso_agw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:oso_agws,id',
        ];
    }
}
