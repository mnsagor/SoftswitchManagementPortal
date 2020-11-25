<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTndpImsAgwRequest;
use App\Http\Requests\UpdateTndpImsAgwRequest;
use App\Http\Resources\Admin\TndpImsAgwResource;
use App\Models\TndpImsAgw;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TndpImsAgwApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tndp_ims_agw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsAgwResource(TndpImsAgw::with(['office'])->get());
    }

    public function store(StoreTndpImsAgwRequest $request)
    {
        $tndpImsAgw = TndpImsAgw::create($request->all());

        return (new TndpImsAgwResource($tndpImsAgw))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TndpImsAgw $tndpImsAgw)
    {
        abort_if(Gate::denies('tndp_ims_agw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TndpImsAgwResource($tndpImsAgw->load(['office']));
    }

    public function update(UpdateTndpImsAgwRequest $request, TndpImsAgw $tndpImsAgw)
    {
        $tndpImsAgw->update($request->all());

        return (new TndpImsAgwResource($tndpImsAgw))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TndpImsAgw $tndpImsAgw)
    {
        abort_if(Gate::denies('tndp_ims_agw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsAgw->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
