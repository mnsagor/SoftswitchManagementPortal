<?php

namespace App\Http\Requests;

use App\Models\OsoAgw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOsoAgwRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_agw_create');
    }

    public function rules()
    {
        return [
            'ip'        => [
                'string',
                'required',
                'unique:oso_agws',
            ],
            'name'      => [
                'string',
                'nullable',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
