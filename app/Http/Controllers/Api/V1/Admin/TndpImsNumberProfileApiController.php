<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTndpImsNumberProfileRequest;
use App\Http\Requests\UpdateTndpImsNumberProfileRequest;
use App\Http\Resources\Admin\TndpImsNumberProfileResource;
use App\Models\TndpImsNumberProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TndpImsNumberProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tndp_ims_number_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsNumberProfileResource(TndpImsNumberProfile::with(['tndp_agw_ip', 'number'])->get());
    }

    public function store(StoreTndpImsNumberProfileRequest $request)
    {
        $tndpImsNumberProfile = TndpImsNumberProfile::create($request->all());

        return (new TndpImsNumberProfileResource($tndpImsNumberProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TndpImsNumberProfile $tndpImsNumberProfile)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsNumberProfileResource($tndpImsNumberProfile->load(['tndp_agw_ip', 'number']));
    }

    public function update(UpdateTndpImsNumberProfileRequest $request, TndpImsNumberProfile $tndpImsNumberProfile)
    {
        $tndpImsNumberProfile->update($request->all());

        return (new TndpImsNumberProfileResource($tndpImsNumberProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TndpImsNumberProfile $tndpImsNumberProfile)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumberProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
