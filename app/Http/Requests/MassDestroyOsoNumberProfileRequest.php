<?php

namespace App\Http\Requests;

use App\Models\OsoNumberProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOsoNumberProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('oso_number_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:oso_number_profiles,id',
        ];
    }
}
