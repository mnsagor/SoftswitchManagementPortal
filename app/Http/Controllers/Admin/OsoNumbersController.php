<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOsoNumberRequest;
use App\Http\Requests\StoreOsoNumberRequest;
use App\Http\Requests\UpdateOsoNumberRequest;
use App\Models\OsoAgw;
use App\Models\OsoNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OsoNumbersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('oso_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OsoNumber::with(['agw_ip'])->select(sprintf('%s.*', (new OsoNumber)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'oso_number_show';
                $editGate      = 'oso_number_edit';
                $deleteGate    = 'oso_number_delete';
                $crudRoutePart = 'oso-numbers';

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
            $table->addColumn('agw_ip_ip', function ($row) {
                return $row->agw_ip ? $row->agw_ip->ip : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'agw_ip']);

            return $table->make(true);
        }

        $oso_agws = OsoAgw::get();

        return view('admin.osoNumbers.index', compact('oso_agws'));
    }

    public function create()
    {
        abort_if(Gate::denies('oso_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.osoNumbers.create', compact('agw_ips'));
    }

    public function store(StoreOsoNumberRequest $request)
    {
        $osoNumber = OsoNumber::create($request->all());

        return redirect()->route('admin.oso-numbers.index');
    }

    public function edit(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $osoNumber->load('agw_ip');

        return view('admin.osoNumbers.edit', compact('agw_ips', 'osoNumber'));
    }

    public function update(UpdateOsoNumberRequest $request, OsoNumber $osoNumber)
    {
        $osoNumber->update($request->all());

        return redirect()->route('admin.oso-numbers.index');
    }

    public function show(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumber->load('agw_ip', 'numberOsoNumberProfiles');

        return view('admin.osoNumbers.show', compact('osoNumber'));
    }

    public function destroy(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumber->delete();

        return back();
    }

    public function massDestroy(MassDestroyOsoNumberRequest $request)
    {
        OsoNumber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
