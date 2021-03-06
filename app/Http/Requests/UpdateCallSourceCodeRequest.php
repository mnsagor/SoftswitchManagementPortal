<?php

namespace App\Http\Requests;

use App\Models\CallSourceCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCallSourceCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('call_source_code_edit');
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
                'unique:call_source_codes,name,' . request()->route('call_source_code')->id,
            ],
            'code'    => [
                'string',
                'required',
            ],
        ];
    }
}
