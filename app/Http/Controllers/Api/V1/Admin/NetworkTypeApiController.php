<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNetworkTypeRequest;
use App\Http\Requests\UpdateNetworkTypeRequest;
use App\Http\Resources\Admin\NetworkTypeResource;
use App\Models\NetworkType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NetworkTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('network_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NetworkTypeResource(NetworkType::all());
    }

    public function store(StoreNetworkTypeRequest $request)
    {
        $networkType = NetworkType::create($request->all());

        return (new NetworkTypeResource($networkType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NetworkType $networkType)
    {
        abort_if(Gate::denies('network_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NetworkTypeResource($networkType);
    }

    public function update(UpdateNetworkTypeRequest $request, NetworkType $networkType)
    {
        $networkType->update($request->all());

        return (new NetworkTypeResource($networkType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NetworkType $networkType)
    {
        abort_if(Gate::denies('network_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
