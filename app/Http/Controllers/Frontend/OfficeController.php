<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOfficeRequest;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Office;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfficeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('office_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offices = Office::all();

        $regions = Region::get();

        return view('frontend.offices.index', compact('offices', 'regions'));
    }

    public function create()
    {
        abort_if(Gate::denies('office_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.offices.create', compact('regions'));
    }

    public function store(StoreOfficeRequest $request)
    {
        $office = Office::create($request->all());

        return redirect()->route('frontend.offices.index');
    }

    public function edit(Office $office)
    {
        abort_if(Gate::denies('office_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office->load('region');

        return view('frontend.offices.edit', compact('regions', 'office'));
    }

    public function update(UpdateOfficeRequest $request, Office $office)
    {
        $office->update($request->all());

        return redirect()->route('frontend.offices.index');
    }

    public function show(Office $office)
    {
        abort_if(Gate::denies('office_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office->load('region');

        return view('frontend.offices.show', compact('office'));
    }

    public function destroy(Office $office)
    {
        abort_if(Gate::denies('office_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfficeRequest $request)
    {
        Office::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
