<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTndpImsNumberProfileRequest;
use App\Http\Requests\StoreTndpImsNumberProfileRequest;
use App\Http\Requests\UpdateTndpImsNumberProfileRequest;
use App\Models\TndpImsAgw;
use App\Models\TndpImsNumber;
use App\Models\TndpImsNumberProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TndpImsNumberProfileController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TndpImsNumberProfile::with(['tndp_agw_ip', 'number'])->select(sprintf('%s.*', (new TndpImsNumberProfile)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tndp_ims_number_profile_show';
                $editGate      = 'tndp_ims_number_profile_edit';
                $deleteGate    = 'tndp_ims_number_profile_delete';
                $crudRoutePart = 'tndp-ims-number-profiles';

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
            $table->addColumn('tndp_agw_ip_ip', function ($row) {
                return $row->tndp_agw_ip ? $row->tndp_agw_ip->ip : '';
            });

            $table->addColumn('number_number', function ($row) {
                return $row->number ? $row->number->number : '';
            });

            $table->editColumn('tndp_ims_number', function ($row) {
                return $row->tndp_ims_number ? $row->tndp_ims_number : "";
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? TndpImsNumberProfile::IS_ACTIVE_RADIO[$row->is_active] : '';
            });
            $table->editColumn('is_td', function ($row) {
                return $row->is_td ? TndpImsNumberProfile::IS_TD_RADIO[$row->is_td] : '';
            });
            $table->editColumn('is_isd', function ($row) {
                return $row->is_isd ? TndpImsNumberProfile::IS_ISD_RADIO[$row->is_isd] : '';
            });
            $table->editColumn('is_eisd', function ($row) {
                return $row->is_eisd ? TndpImsNumberProfile::IS_EISD_RADIO[$row->is_eisd] : '';
            });
            $table->editColumn('is_pbx', function ($row) {
                return $row->is_pbx ? TndpImsNumberProfile::IS_PBX_RADIO[$row->is_pbx] : '';
            });
            $table->editColumn('pbx_poilot_number', function ($row) {
                return $row->pbx_poilot_number ? $row->pbx_poilot_number : "";
            });
            $table->editColumn('request_controller', function ($row) {
                return $row->request_controller ? TndpImsNumberProfile::REQUEST_CONTROLLER_RADIO[$row->request_controller] : '';
            });
            $table->editColumn('is_queued', function ($row) {
                return $row->is_queued ? TndpImsNumberProfile::IS_QUEUED_RADIO[$row->is_queued] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'tndp_agw_ip', 'number']);

            return $table->make(true);
        }

        $tndp_ims_agws    = TndpImsAgw::get();
        $tndp_ims_numbers = TndpImsNumber::get();

        return view('admin.tndpImsNumberProfiles.index', compact('tndp_ims_agws', 'tndp_ims_numbers'));
    }

    public function create()
    {
        abort_if(Gate::denies('tndp_ims_number_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndp_agw_ips = TndpImsAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = TndpImsNumber::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tndpImsNumberProfiles.create', compact('tndp_agw_ips', 'numbers'));
    }

    public function store(StoreTndpImsNumberProfileRequest $request)
    {
        $tndpImsNumberProfile = TndpImsNumberProfile::create($request->all());

        return redirect()->route('admin.tndp-ims-number-profiles.index');
    }

    public function edit(TndpImsNumberProfile $tndpImsNumberProfile)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndp_agw_ips = TndpImsAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = TndpImsNumber::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tndpImsNumberProfile->load('tndp_agw_ip', 'number');

        return view('admin.tndpImsNumberProfiles.edit', compact('tndp_agw_ips', 'numbers', 'tndpImsNumberProfile'));
    }

    public function update(UpdateTndpImsNumberProfileRequest $request, TndpImsNumberProfile $tndpImsNumberProfile)
    {
        $tndpImsNumberProfile->update($request->all());

        return redirect()->route('admin.tndp-ims-number-profiles.index');
    }

    public function show(TndpImsNumberProfile $tndpImsNumberProfile)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumberProfile->load('tndp_agw_ip', 'number');

        return view('admin.tndpImsNumberProfiles.show', compact('tndpImsNumberProfile'));
    }

    public function destroy(TndpImsNumberProfile $tndpImsNumberProfile)
    {
        abort_if(Gate::denies('tndp_ims_number_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsNumberProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyTndpImsNumberProfileRequest $request)
    {
        TndpImsNumberProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
