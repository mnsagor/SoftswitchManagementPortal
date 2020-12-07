<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCallSourceCodeRequest;
use App\Http\Requests\StoreCallSourceCodeRequest;
use App\Http\Requests\UpdateCallSourceCodeRequest;
use App\Models\CallSourceCode;
use App\Models\Office;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CallSourceCodeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('call_source_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callSourceCodes = CallSourceCode::with(['zone'])->get();

        return view('admin.callSourceCodes.index', compact('callSourceCodes'));
    }

    public function create()
    {
        abort_if(Gate::denies('call_source_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zones = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.callSourceCodes.create', compact('zones'));
    }

    public function store(StoreCallSourceCodeRequest $request)
    {
        $callSourceCode = CallSourceCode::create($request->all());

        return redirect()->route('admin.call-source-codes.index');
    }

    public function edit(CallSourceCode $callSourceCode)
    {
        abort_if(Gate::denies('call_source_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zones = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $callSourceCode->load('zone');

        return view('admin.callSourceCodes.edit', compact('zones', 'callSourceCode'));
    }

    public function update(UpdateCallSourceCodeRequest $request, CallSourceCode $callSourceCode)
    {
        $callSourceCode->update($request->all());

        return redirect()->route('admin.call-source-codes.index');
    }

    public function show(CallSourceCode $callSourceCode)
    {
        abort_if(Gate::denies('call_source_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callSourceCode->load('zone', 'callSourceCodeUsers');

        return view('admin.callSourceCodes.show', compact('callSourceCode'));
    }

    public function destroy(CallSourceCode $callSourceCode)
    {
        abort_if(Gate::denies('call_source_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callSourceCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyCallSourceCodeRequest $request)
    {
        CallSourceCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
