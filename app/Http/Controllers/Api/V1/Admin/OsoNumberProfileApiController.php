<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOsoNumberProfileRequest;
use App\Http\Requests\UpdateOsoNumberProfileRequest;
use App\Http\Resources\Admin\OsoNumberProfileResource;
use App\Models\OsoNumberProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OsoNumberProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('oso_number_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoNumberProfileResource(OsoNumberProfile::with(['number'])->get());
    }

    public function store(StoreOsoNumberProfileRequest $request)
    {
        $osoNumberProfile = OsoNumberProfile::create($request->all());

        return (new OsoNumberProfileResource($osoNumberProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OsoNumberProfile $osoNumberProfile)
    {
        abort_if(Gate::denies('oso_number_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoNumberProfileResource($osoNumberProfile->load(['number']));
    }

    public function update(UpdateOsoNumberProfileRequest $request, OsoNumberProfile $osoNumberProfile)
    {
        $osoNumberProfile->update($request->all());

        return (new OsoNumberProfileResource($osoNumberProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OsoNumberProfile $osoNumberProfile)
    {
        abort_if(Gate::denies('oso_number_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumberProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
