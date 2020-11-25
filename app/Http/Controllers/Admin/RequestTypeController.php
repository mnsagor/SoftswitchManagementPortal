<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRequestTypeRequest;
use App\Http\Requests\StoreRequestTypeRequest;
use App\Http\Requests\UpdateRequestTypeRequest;
use App\Models\RequestType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('request_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestTypes = RequestType::all();

        return view('admin.requestTypes.index', compact('requestTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('request_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requestTypes.create');
    }

    public function store(StoreRequestTypeRequest $request)
    {
        $requestType = RequestType::create($request->all());

        return redirect()->route('admin.request-types.index');
    }

    public function edit(RequestType $requestType)
    {
        abort_if(Gate::denies('request_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requestTypes.edit', compact('requestType'));
    }

    public function update(UpdateRequestTypeRequest $request, RequestType $requestType)
    {
        $requestType->update($request->all());

        return redirect()->route('admin.request-types.index');
    }

    public function show(RequestType $requestType)
    {
        abort_if(Gate::denies('request_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestType->load('requestTypeJobRequests');

        return view('admin.requestTypes.show', compact('requestType'));
    }

    public function destroy(RequestType $requestType)
    {
        abort_if(Gate::denies('request_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestType->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestTypeRequest $request)
    {
        RequestType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
