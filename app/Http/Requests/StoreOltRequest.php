<?php

namespace App\Http\Requests;

use App\Models\Olt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOltRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('olt_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:olts',
            ],
            'ip'   => [
                'string',
                'required',
                'unique:olts',
            ],
            'vlan' => [
                'string',
                'required',
                'unique:olts',
            ],
        ];
    }
}
