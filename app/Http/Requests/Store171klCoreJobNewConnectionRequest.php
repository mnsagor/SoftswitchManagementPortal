<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class Store171klCoreJobNewConnectionRequest extends FormRequest
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
//            'network_type_id'     => [
//                'required',
//                'integer',
//            ],
//            'job_type_id'         => [
//                'required',
//                'integer',
//            ],
//            'request_type_id'     => [
//                'required',
//                'integer',
//            ],
//            'request_status_id'   => [
//                'required',
//                'integer',
//            ],
            'number'              => [
                'string',
                'required',
            ],
            'agw_ip'              => [
                'string',
                'required',
            ],
            'tid'                 => [
                'string',
                'required',
            ],
//            'call_source_code_id' => [
//                'required',
//                'integer',
//            ],
            'requested_by_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}
