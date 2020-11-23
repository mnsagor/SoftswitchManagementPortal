<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmplpyeeRequest;
use App\Http\Requests\UpdateEmplpyeeRequest;
use App\Http\Resources\Admin\EmplpyeeResource;
use App\Models\Emplpyee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmplpyeeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('emplpyee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmplpyeeResource(Emplpyee::with(['designation', 'office'])->get());
    }

    public function store(StoreEmplpyeeRequest $request)
    {
        $emplpyee = Emplpyee::create($request->all());

        return (new EmplpyeeResource($emplpyee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmplpyeeResource($emplpyee->load(['designation', 'office']));
    }

    public function update(UpdateEmplpyeeRequest $request, Emplpyee $emplpyee)
    {
        $emplpyee->update($request->all());

        return (new EmplpyeeResource($emplpyee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
