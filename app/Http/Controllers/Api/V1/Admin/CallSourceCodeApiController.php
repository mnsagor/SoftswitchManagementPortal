<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallSourceCodeRequest;
use App\Http\Requests\UpdateCallSourceCodeRequest;
use App\Http\Resources\Admin\CallSourceCodeResource;
use App\Models\CallSourceCode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CallSourceCodeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('call_source_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CallSourceCodeResource(CallSourceCode::with(['zone'])->get());
    }

    public function store(StoreCallSourceCodeRequest $request)
    {
        $callSourceCode = CallSourceCode::create($request->all());

        return (new CallSourceCodeResource($callSourceCode))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CallSourceCode $callSourceCode)
    {
        abort_if(Gate::denies('call_source_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CallSourceCodeResource($callSourceCode->load(['zone']));
    }

    public function update(UpdateCallSourceCodeRequest $request, CallSourceCode $callSourceCode)
    {
        $callSourceCode->update($request->all());

        return (new CallSourceCodeResource($callSourceCode))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CallSourceCode $callSourceCode)
    {
        abort_if(Gate::denies('call_source_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callSourceCode->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
