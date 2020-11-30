<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTndpImsOltProfileRequest;
use App\Http\Requests\StoreTndpImsOltProfileRequest;
use App\Http\Requests\UpdateTndpImsOltProfileRequest;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\Olt;
use App\Models\TndpImsOltProfile;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TndpImsOltProfileController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TndpImsOltProfile::with(['olt_name', 'job_type', 'status'])->select(sprintf('%s.*', (new TndpImsOltProfile)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tndp_ims_olt_profile_show';
                $editGate      = 'tndp_ims_olt_profile_edit';
                $deleteGate    = 'tndp_ims_olt_profile_delete';
                $crudRoutePart = 'tndp-ims-olt-profiles';

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
            $table->addColumn('olt_name_name', function ($row) {
                return $row->olt_name ? $row->olt_name->name : '';
            });

            $table->addColumn('job_type_name', function ($row) {
                return $row->job_type ? $row->job_type->name : '';
            });

            $table->editColumn('device_type', function ($row) {
                return $row->device_type ? TndpImsOltProfile::DEVICE_TYPE_SELECT[$row->device_type] : '';
            });
            $table->editColumn('no_of_ports', function ($row) {
                return $row->no_of_ports ? TndpImsOltProfile::NO_OF_PORTS_SELECT[$row->no_of_ports] : '';
            });
            $table->editColumn('serial_number', function ($row) {
                return $row->serial_number ? $row->serial_number : "";
            });
            $table->editColumn('interface', function ($row) {
                return $row->interface ? $row->interface : "";
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : "";
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('port_number', function ($row) {
                return $row->port_number ? $row->port_number : "";
            });
            $table->editColumn('service', function ($row) {
                return $row->service ? TndpImsOltProfile::SERVICE_SELECT[$row->service] : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'olt_name', 'job_type', 'status']);

            return $table->make(true);
        }

        $olts                 = Olt::get();
        $job_types            = JobType::get();
        $job_request_statuses = JobRequestStatus::get();

        return view('admin.tndpImsOltProfiles.index', compact('olts', 'job_types', 'job_request_statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olt_names = Olt::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = JobRequestStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tndpImsOltProfiles.create', compact('olt_names', 'job_types', 'statuses'));
    }

    public function store(StoreTndpImsOltProfileRequest $request)
    {
        $tndpImsOltProfile = TndpImsOltProfile::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tndpImsOltProfile->id]);
        }

        return redirect()->route('admin.tndp-ims-olt-profiles.index');
    }

    public function edit(TndpImsOltProfile $tndpImsOltProfile)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $olt_names = Olt::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = JobRequestStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tndpImsOltProfile->load('olt_name', 'job_type', 'status');

        return view('admin.tndpImsOltProfiles.edit', compact('olt_names', 'job_types', 'statuses', 'tndpImsOltProfile'));
    }

    public function update(UpdateTndpImsOltProfileRequest $request, TndpImsOltProfile $tndpImsOltProfile)
    {
        $tndpImsOltProfile->update($request->all());

        return redirect()->route('admin.tndp-ims-olt-profiles.index');
    }

    public function show(TndpImsOltProfile $tndpImsOltProfile)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsOltProfile->load('olt_name', 'job_type', 'status');

        return view('admin.tndpImsOltProfiles.show', compact('tndpImsOltProfile'));
    }

    public function destroy(TndpImsOltProfile $tndpImsOltProfile)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsOltProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyTndpImsOltProfileRequest $request)
    {
        TndpImsOltProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_olt_profile_create') && Gate::denies('tndp_ims_olt_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TndpImsOltProfile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
