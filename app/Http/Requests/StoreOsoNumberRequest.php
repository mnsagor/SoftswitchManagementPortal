<?php

namespace App\Http\Requests;

use App\Models\OsoNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOsoNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oso_number_create');
    }

    public function rules()
    {
        return [
            'number'    => [
                'string',
                'required',
                'unique:oso_numbers',
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
