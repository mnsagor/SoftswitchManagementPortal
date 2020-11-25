<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTndpImsNumberRequest;
use App\Http\Requests\StoreTndpImsNumberRequest;
use App\Http\Requests\UpdateTndpImsNumberRequest;
use App\Models\TndpImsNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TndpImsNumbersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TndpImsNumber::query()->select(sprintf('%s.*', (new TndpImsNumber)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tndp_ims_number_show';
                $editGate      = 'tndp_ims_number_edit';
                $deleteGate    = 'tndp_ims_number_delete';
                $crudRoutePart = 'tndp-ims-numbers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('tid', function ($row) {
                return $row->tid ? $row->tid : "";
            });
            $table->editColumn('agw_ip', function ($row) {
                return $row->agw_ip ? $row->agw_ip : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.tndpImsNumbers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tndp_ims_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tndpImsNumbers.create');
    }

    public function store(StoreTndpImsNumberRequest $request)
    {
        $tndpImsNumber = TndpImsNumber::create($request->all());

        return redirect()->route('admin.tndp-ims-numbers.index');
    }

    public function edit(TndpImsNumber $tndpImsNumber)
    {
        abort_if(Gate::denies('tndp_ims_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tndpImsNumbers.edit', compact('tndpImsNumber'));
    }

    public function update(UpdateTndpImsNumberRequest $request, TndpImsNumber $tndpImsNumber)
    {
        $tndpImsNumber->update($request->all());

        return redirect()->route('admin.tndp-ims-numbers.index');
    }

    public function show(TndpImsNumber $tndpImsNumber)
    {
        abort_if(Gate::denies('tndp_ims_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumber->load('numberTndpImsNumberProfiles');

        return view('admin.tndpImsNumbers.show', compact('tndpImsNumber'));
    }

    public function destroy(TndpImsNumber $tndpImsNumber)
    {
        abort_if(Gate::denies('tndp_ims_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumber->delete();

        return back();
    }

    public function massDestroy(MassDestroyTndpImsNumberRequest $request)
    {
        TndpImsNumber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
