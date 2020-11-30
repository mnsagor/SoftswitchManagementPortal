<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNetworkTypeRequest;
use App\Http\Requests\StoreNetworkTypeRequest;
use App\Http\Requests\UpdateNetworkTypeRequest;
use App\Models\NetworkType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NetworkTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('network_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkTypes = NetworkType::all();

        return view('admin.networkTypes.index', compact('networkTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('network_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkTypes.create');
    }

    public function store(StoreNetworkTypeRequest $request)
    {
        $networkType = NetworkType::create($request->all());

        return redirect()->route('admin.network-types.index');
    }

    public function edit(NetworkType $networkType)
    {
        abort_if(Gate::denies('network_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkTypes.edit', compact('networkType'));
    }

    public function update(UpdateNetworkTypeRequest $request, NetworkType $networkType)
    {
        $networkType->update($request->all());

        return redirect()->route('admin.network-types.index');
    }

    public function show(NetworkType $networkType)
    {
        abort_if(Gate::denies('network_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkType->load('networkTypeJobRequests', 'networkTypeOltJobRequests');

        return view('admin.networkTypes.show', compact('networkType'));
    }

    public function destroy(NetworkType $networkType)
    {
        abort_if(Gate::denies('network_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkType->delete();

        return back();
    }

    public function massDestroy(MassDestroyNetworkTypeRequest $request)
    {
        NetworkType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
