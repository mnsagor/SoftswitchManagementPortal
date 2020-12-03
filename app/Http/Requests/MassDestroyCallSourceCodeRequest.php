<?php

namespace App\Http\Requests;

use App\Models\CallSourceCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCallSourceCodeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('call_source_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:call_source_codes,id',
        ];
    }
}
