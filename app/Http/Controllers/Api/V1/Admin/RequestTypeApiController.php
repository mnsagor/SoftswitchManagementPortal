<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestTypeRequest;
use App\Http\Requests\UpdateRequestTypeRequest;
use App\Http\Resources\Admin\RequestTypeResource;
use App\Models\RequestType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('request_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestTypeResource(RequestType::all());
    }

    public function store(StoreRequestTypeRequest $request)
    {
        $requestType = RequestType::create($request->all());

        return (new RequestTypeResource($requestType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RequestType $requestType)
    {
        abort_if(Gate::denies('request_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestTypeResource($requestType);
    }

    public function update(UpdateRequestTypeRequest $request, RequestType $requestType)
    {
        $requestType->update($request->all());

        return (new RequestTypeResource($requestType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RequestType $requestType)
    {
        abort_if(Gate::denies('request_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
