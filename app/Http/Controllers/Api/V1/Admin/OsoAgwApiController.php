<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOsoAgwRequest;
use App\Http\Requests\UpdateOsoAgwRequest;
use App\Http\Resources\Admin\OsoAgwResource;
use App\Models\OsoAgw;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OsoAgwApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('oso_agw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoAgwResource(OsoAgw::with(['office'])->get());
    }

    public function store(StoreOsoAgwRequest $request)
    {
        $osoAgw = OsoAgw::create($request->all());

        return (new OsoAgwResource($osoAgw))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OsoAgw $osoAgw)
    {
        abort_if(Gate::denies('oso_agw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OsoAgwResource($osoAgw->load(['office']));
    }

    public function update(UpdateOsoAgwRequest $request, OsoAgw $osoAgw)
    {
        $osoAgw->update($request->all());

        return (new OsoAgwResource($osoAgw))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OsoAgw $osoAgw)
    {
        abort_if(Gate::denies('oso_agw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoAgw->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
