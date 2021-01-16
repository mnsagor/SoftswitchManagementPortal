<?php

namespace App\Http\Requests;
use Gate;

use Illuminate\Foundation\Http\FormRequest;

class Store171klCoreJobPermanentCloseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('core_job_request_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number'              => [
                'string',
                'required',
            ],
            'requested_by_id'     => [
                'required',
                'integer',
            ]
        ];
    }
}
