<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOsoNumberRequest;
use App\Http\Requests\UpdateOsoNumberRequest;
use App\Http\Resources\Admin\OsoNumberResource;
use App\Models\OsoNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OsoNumbersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('oso_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoNumberResource(OsoNumber::with(['agw_ip'])->get());
    }

    public function store(StoreOsoNumberRequest $request)
    {
        $osoNumber = OsoNumber::create($request->all());

        return (new OsoNumberResource($osoNumber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoNumberResource($osoNumber->load(['agw_ip']));
    }

    public function update(UpdateOsoNumberRequest $request, OsoNumber $osoNumber)
    {
        $osoNumber->update($request->all());

        return (new OsoNumberResource($osoNumber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
