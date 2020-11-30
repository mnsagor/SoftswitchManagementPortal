<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOltRequest;
use App\Http\Requests\UpdateOltRequest;
use App\Http\Resources\Admin\OltResource;
use App\Models\Olt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OltApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('olt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OltResource(Olt::all());
    }

    public function store(StoreOltRequest $request)
    {
        $olt = Olt::create($request->all());

        return (new OltResource($olt))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Olt $olt)
    {
        abort_if(Gate::denies('olt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OltResource($olt);
    }

    public function update(UpdateOltRequest $request, Olt $olt)
    {
        $olt->update($request->all());

        return (new OltResource($olt))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Olt $olt)
    {
        abort_if(Gate::denies('olt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olt->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
