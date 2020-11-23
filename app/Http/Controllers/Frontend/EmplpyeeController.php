<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmplpyeeRequest;
use App\Http\Requests\StoreEmplpyeeRequest;
use App\Http\Requests\UpdateEmplpyeeRequest;
use App\Models\Designation;
use App\Models\Emplpyee;
use App\Models\Office;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmplpyeeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('emplpyee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyees = Emplpyee::all();

        $designations = Designation::get();

        $offices = Office::get();

        return view('frontend.emplpyees.index', compact('emplpyees', 'designations', 'offices'));
    }

    public function create()
    {
        abort_if(Gate::denies('emplpyee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.emplpyees.create', compact('designations', 'offices'));
    }

    public function store(StoreEmplpyeeRequest $request)
    {
        $emplpyee = Emplpyee::create($request->all());

        return redirect()->route('frontend.emplpyees.index');
    }

    public function edit(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emplpyee->load('designation', 'office');

        return view('frontend.emplpyees.edit', compact('designations', 'offices', 'emplpyee'));
    }

    public function update(UpdateEmplpyeeRequest $request, Emplpyee $emplpyee)
    {
        $emplpyee->update($request->all());

        return redirect()->route('frontend.emplpyees.index');
    }

    public function show(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyee->load('designation', 'office', 'employeeUsers');

        return view('frontend.emplpyees.show', compact('emplpyee'));
    }

    public function destroy(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmplpyeeRequest $request)
    {
        Emplpyee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
