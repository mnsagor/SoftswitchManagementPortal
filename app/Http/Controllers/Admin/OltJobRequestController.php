<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOltJobRequestRequest;
use App\Http\Requests\StoreOltJobRequestRequest;
use App\Http\Requests\UpdateOltJobRequestRequest;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\NetworkType;
use App\Models\Olt;
use App\Models\OltJobRequest;
use App\Models\RequestType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OltJobRequestController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('olt_job_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OltJobRequest::with(['network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by'])->select(sprintf('%s.*', (new OltJobRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'olt_job_request_show';
                $editGate      = 'olt_job_request_edit';
                $deleteGate    = 'olt_job_request_delete';
                $crudRoutePart = 'olt-job-requests';

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
            $table->addColumn('network_type_name', function ($row) {
                return $row->network_type ? $row->network_type->name : '';
            });

            $table->addColumn('job_type_name', function ($row) {
                return $row->job_type ? $row->job_type->name : '';
            });

            $table->addColumn('request_type_name', function ($row) {
                return $row->request_type ? $row->request_type->name : '';
            });

            $table->addColumn('request_status_name', function ($row) {
                return $row->request_status ? $row->request_status->name : '';
            });

            $table->addColumn('olt_ip_ip', function ($row) {
                return $row->olt_ip ? $row->olt_ip->ip : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('interface', function ($row) {
                return $row->interface ? $row->interface : "";
            });
            $table->editColumn('service_type', function ($row) {
                return $row->service_type ? OltJobRequest::SERVICE_TYPE_SELECT[$row->service_type] : '';
            });
            $table->editColumn('port_number', function ($row) {
                return $row->port_number ? $row->port_number : "";
            });
            $table->editColumn('device_ip', function ($row) {
                return $row->device_ip ? $row->device_ip : "";
            });
            $table->addColumn('requested_by_name', function ($row) {
                return $row->requested_by ? $row->requested_by->name : '';
            });

            $table->addColumn('verified_by_name', function ($row) {
                return $row->verified_by ? $row->verified_by->name : '';
            });

            $table->addColumn('approved_by_name', function ($row) {
                return $row->approved_by ? $row->approved_by->name : '';
            });

            $table->addColumn('rejected_by_name', function ($row) {
                return $row->rejected_by ? $row->rejected_by->name : '';
            });

            $table->editColumn('script', function ($row) {
                return $row->script ? $row->script : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by']);

            return $table->make(true);
        }

        $network_types        = NetworkType::get();
        $job_types            = JobType::get();
        $request_types        = RequestType::get();
        $job_request_statuses = JobRequestStatus::get();
        $olts                 = Olt::get();
        $users                = User::get();
        $users                = User::get();
        $users                = User::get();
        $users                = User::get();

        return view('admin.oltJobRequests.index', compact('network_types', 'job_types', 'request_types', 'job_request_statuses', 'olts', 'users', 'users', 'users', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('olt_job_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $network_types = NetworkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_types = RequestType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_statuses = JobRequestStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $olt_ips = Olt::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requested_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rejected_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.oltJobRequests.create', compact('network_types', 'job_types', 'request_types', 'request_statuses', 'olt_ips', 'requested_bies', 'verified_bies', 'approved_bies', 'rejected_bies'));
    }

    public function store(StoreOltJobRequestRequest $request)
    {
        $oltJobRequest = OltJobRequest::create($request->all());

        foreach ($request->input('file', []) as $file) {
            $oltJobRequest->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $oltJobRequest->id]);
        }

        return redirect()->route('admin.olt-job-requests.index');
    }

    public function edit(OltJobRequest $oltJobRequest)
    {
        abort_if(Gate::denies('olt_job_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $network_types = NetworkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_types = RequestType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_statuses = JobRequestStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $olt_ips = Olt::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requested_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rejected_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $oltJobRequest->load('network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by');

        return view('admin.oltJobRequests.edit', compact('network_types', 'job_types', 'request_types', 'request_statuses', 'olt_ips', 'requested_bies', 'verified_bies', 'approved_bies', 'rejected_bies', 'oltJobRequest'));
    }

    public function update(UpdateOltJobRequestRequest $request, OltJobRequest $oltJobRequest)
    {
        $oltJobRequest->update($request->all());

        if (count($oltJobRequest->file) > 0) {
            foreach ($oltJobRequest->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $oltJobRequest->file->pluck('file_name')->toArray();

        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $oltJobRequest->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
        }

        return redirect()->route('admin.olt-job-requests.index');
    }

    public function show(OltJobRequest $oltJobRequest)
    {
        abort_if(Gate::denies('olt_job_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oltJobRequest->load('network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by');

        return view('admin.oltJobRequests.show', compact('oltJobRequest'));
    }

    public function destroy(OltJobRequest $oltJobRequest)
    {
        abort_if(Gate::denies('olt_job_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oltJobRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyOltJobRequestRequest $request)
    {
        OltJobRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('olt_job_request_create') && Gate::denies('olt_job_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OltJobRequest();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
