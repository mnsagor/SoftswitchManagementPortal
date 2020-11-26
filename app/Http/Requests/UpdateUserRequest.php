<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'required',
            ],
            'username'       => [
                'string',
                'required',
                'unique:users,username,' . request()->route('user')->id,
            ],
            'payroll_emp_id' => [
                'required',
                'integer',
            ],
            'designation_id' => [
                'required',
                'integer',
            ],
            'email'          => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*'        => [
                'integer',
            ],
            'roles'          => [
                'required',
                'array',
            ],
            'offices.*'      => [
                'integer',
            ],
            'offices'        => [
                'required',
                'array',
            ],
        ];
    }
}
