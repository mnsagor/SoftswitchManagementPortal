<?php

namespace App\Http\Requests;

use App\Models\OsoNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOsoNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_number_edit');
    }

    public function rules()
    {
        return [
            'number'    => [
                'string',
                'required',
                'unique:oso_numbers,number,' . request()->route('oso_number')->id,
            ],
            'tid'       => [
                'string',
                'required',
            ],
            'agw_ip_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
