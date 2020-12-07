<?php

namespace App\Http\Requests;

use App\Models\CallSourceCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCallSourceCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('call_source_code_create');
    }

    public function rules()
    {
        return [
            'zone_id' => [
                'required',
                'integer',
            ],
            'name'    => [
                'string',
                'required',
                'unique:call_source_codes',
            ],
            'code'    => [
                'string',
                'required',
            ],
        ];
    }
}
