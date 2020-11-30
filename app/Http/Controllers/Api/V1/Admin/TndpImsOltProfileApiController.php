<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTndpImsOltProfileRequest;
use App\Http\Requests\UpdateTndpImsOltProfileRequest;
use App\Http\Resources\Admin\TndpImsOltProfileResource;
use App\Models\TndpImsOltProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TndpImsOltProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsOltProfileResource(TndpImsOltProfile::with(['olt_name', 'job_type', 'status'])->get());
    }

    public function store(StoreTndpImsOltProfileRequest $request)
    {
        $tndpImsOltProfile = TndpImsOltProfile::create($request->all());

        return (new TndpImsOltProfileResource($tndpImsOltProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TndpImsOltProfile $tndpImsOltProfile)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsOltProfileResource($tndpImsOltProfile->load(['olt_name', 'job_type', 'status']));
    }

    public function update(UpdateTndpImsOltProfileRequest $request, TndpImsOltProfile $tndpImsOltProfile)
    {
        $tndpImsOltProfile->update($request->all());

        return (new TndpImsOltProfileResource($tndpImsOltProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TndpImsOltProfile $tndpImsOltProfile)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsOltProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
