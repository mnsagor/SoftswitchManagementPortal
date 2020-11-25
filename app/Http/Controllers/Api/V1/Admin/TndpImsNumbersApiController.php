<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTndpImsNumberRequest;
use App\Http\Requests\UpdateTndpImsNumberRequest;
use App\Http\Resources\Admin\TndpImsNumberResource;
use App\Models\TndpImsNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TndpImsNumbersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tndp_ims_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsNumberResource(TndpImsNumber::all());
    }

    public function store(StoreTndpImsNumberRequest $request)
    {
        $tndpImsNumber = TndpImsNumber::create($request->all());

        return (new TndpImsNumberResource($tndpImsNumber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TndpImsNumber $tndpImsNumber)
    {
        abort_if(Gate::denies('tndp_ims_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsNumberResource($tndpImsNumber);
    }

    public function update(UpdateTndpImsNumberRequest $request, TndpImsNumber $tndpImsNumber)
    {
        $tndpImsNumber->update($request->all());

        return (new TndpImsNumberResource($tndpImsNumber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TndpImsNumber $tndpImsNumber)
    {
        abort_if(Gate::denies('tndp_ims_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
