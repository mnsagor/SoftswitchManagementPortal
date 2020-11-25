<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class OfficeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('office_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Office::with(['region'])->select(sprintf('%s.*', (new Office)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'office_show';
                $editGate      = 'office_edit';
                $deleteGate    = 'office_delete';
                $crudRoutePart = 'offices';

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
            $table->addColumn('region_name', function ($row) {
                return $row->region ? $row->region->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? Office::IS_ACTIVE_RADIO[$row->is_active] : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? $row->area : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'region']);

            return $table->make(true);
        }

        $regions = Region::get();

        return view('admin.offices.index', compact('regions'));
    }

    public function create()
    {
        abort_if(Gate::denies('office_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offices.create', compact('regions'));
    }

    public function store(StoreOfficeRequest $request)
    {
        $office = Office::create($request->all());

        return redirect()->route('admin.offices.index');
    }

    public function edit(Office $office)
    {
        abort_if(Gate::denies('office_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office->load('region');

        return view('admin.offices.edit', compact('regions', 'office'));
    }

    public function update(UpdateOfficeRequest $request, Office $office)
    {
        $office->update($request->all());

        return redirect()->route('admin.offices.index');
    }

    public function show(Office $office)
    {
        abort_if(Gate::denies('office_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office->load('region', 'officeOsoAgws', 'officeTndpImsAgws', 'officeUsers');

        return view('admin.offices.show', compact('office'));
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
