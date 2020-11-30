<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOltRequest;
use App\Http\Requests\StoreOltRequest;
use App\Http\Requests\UpdateOltRequest;
use App\Models\Olt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OltController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('olt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olts = Olt::all();

        return view('admin.olts.index', compact('olts'));
    }

    public function create()
    {
        abort_if(Gate::denies('olt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.olts.create');
    }

    public function store(StoreOltRequest $request)
    {
        $olt = Olt::create($request->all());

        return redirect()->route('admin.olts.index');
    }

    public function edit(Olt $olt)
    {
        abort_if(Gate::denies('olt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.olts.edit', compact('olt'));
    }

    public function update(UpdateOltRequest $request, Olt $olt)
    {
        $olt->update($request->all());

        return redirect()->route('admin.olts.index');
    }

    public function show(Olt $olt)
    {
        abort_if(Gate::denies('olt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olt->load('oltNameTndpImsOltProfiles', 'oltIpOltJobRequests');

        return view('admin.olts.show', compact('olt'));
    }

    public function destroy(Olt $olt)
    {
        abort_if(Gate::denies('olt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olt->delete();

        return back();
    }

    public function massDestroy(MassDestroyOltRequest $request)
    {
        Olt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
