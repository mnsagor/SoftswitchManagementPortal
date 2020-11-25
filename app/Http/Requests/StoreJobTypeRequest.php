<?php

namespace App\Http\Requests;

use App\Models\JobType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_type_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:job_types',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
