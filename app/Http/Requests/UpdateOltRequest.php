<?php

namespace App\Http\Requests;

use App\Models\Olt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOltRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('olt_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:olts,name,' . request()->route('olt')->id,
            ],
            'ip'   => [
                'string',
                'required',
                'unique:olts,ip,' . request()->route('olt')->id,
            ],
            'vlan' => [
                'string',
                'required',
                'unique:olts,vlan,' . request()->route('olt')->id,
            ],
        ];
    }
}
