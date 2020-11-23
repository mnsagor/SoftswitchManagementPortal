<?php

namespace App\Http\Requests;

use App\Models\Emplpyee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmplpyeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('emplpyee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:emplpyees,id',
        ];
    }
}
