<?php

namespace App\Http\Requests;

use App\Models\OsoAgw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOsoAgwRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_agw_edit');
    }

    public function rules()
    {
        return [
            'ip'        => [
                'string',
                'required',
                'unique:oso_agws,ip,' . request()->route('oso_agw')->id,
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
