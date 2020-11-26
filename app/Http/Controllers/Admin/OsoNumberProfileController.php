<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOsoNumberProfileRequest;
use App\Http\Requests\StoreOsoNumberProfileRequest;
use App\Http\Requests\UpdateOsoNumberProfileRequest;
use App\Models\OsoAgw;
use App\Models\OsoNumber;
use App\Models\OsoNumberProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OsoNumberProfileController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('oso_number_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OsoNumberProfile::with(['oso_agw_ip', 'number'])->select(sprintf('%s.*', (new OsoNumberProfile)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'oso_number_profile_show';
                $editGate      = 'oso_number_profile_edit';
                $deleteGate    = 'oso_number_profile_delete';
                $crudRoutePart = 'oso-number-profiles';

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
            $table->addColumn('oso_agw_ip_ip', function ($row) {
                return $row->oso_agw_ip ? $row->oso_agw_ip->ip : '';
            });

            $table->addColumn('number_number', function ($row) {
                return $row->number ? $row->number->number : '';
            });

            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? OsoNumberProfile::IS_ACTIVE_RADIO[$row->is_active] : '';
            });
            $table->editColumn('is_td', function ($row) {
                return $row->is_td ? OsoNumberProfile::IS_TD_RADIO[$row->is_td] : '';
            });
            $table->editColumn('is_isd', function ($row) {
                return $row->is_isd ? OsoNumberProfile::IS_ISD_RADIO[$row->is_isd] : '';
            });
            $table->editColumn('is_eisd', function ($row) {
                return $row->is_eisd ? OsoNumberProfile::IS_EISD_RADIO[$row->is_eisd] : '';
            });
            $table->editColumn('is_pbx', function ($row) {
                return $row->is_pbx ? OsoNumberProfile::IS_PBX_RADIO[$row->is_pbx] : '';
            });
            $table->editColumn('pbx_poilot_number', function ($row) {
                return $row->pbx_poilot_number ? $row->pbx_poilot_number : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'oso_agw_ip', 'number']);

            return $table->make(true);
        }

        $oso_agws    = OsoAgw::get();
        $oso_numbers = OsoNumber::get();

        return view('admin.osoNumberProfiles.index', compact('oso_agws', 'oso_numbers'));
    }

    public function create()
    {
        abort_if(Gate::denies('oso_number_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oso_agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = OsoNumber::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.osoNumberProfiles.create', compact('oso_agw_ips', 'numbers'));
    }

    public function store(StoreOsoNumberProfileRequest $request)
    {
        $osoNumberProfile = OsoNumberProfile::create($request->all());

        return redirect()->route('admin.oso-number-profiles.index');
    }

    public function edit(OsoNumberProfile $osoNumberProfile)
    {
        abort_if(Gate::denies('oso_number_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oso_agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = OsoNumber::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $osoNumberProfile->load('oso_agw_ip', 'number');

        return view('admin.osoNumberProfiles.edit', compact('oso_agw_ips', 'numbers', 'osoNumberProfile'));
    }

    public function update(UpdateOsoNumberProfileRequest $request, OsoNumberProfile $osoNumberProfile)
    {
        $osoNumberProfile->update($request->all());

        return redirect()->route('admin.oso-number-profiles.index');
    }

    public function show(OsoNumberProfile $osoNumberProfile)
    {
        abort_if(Gate::denies('oso_number_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumberProfile->load('oso_agw_ip', 'number');

        return view('admin.osoNumberProfiles.show', compact('osoNumberProfile'));
    }

    public function destroy(OsoNumberProfile $osoNumberProfile)
    {
        abort_if(Gate::denies('oso_number_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumberProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyOsoNumberProfileRequest $request)
    {
        OsoNumberProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
