<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJobRequestStatusRequest;
use App\Http\Requests\StoreJobRequestStatusRequest;
use App\Http\Requests\UpdateJobRequestStatusRequest;
use App\Models\JobRequestStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobRequestStatusController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('job_request_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequestStatuses = JobRequestStatus::all();

        return view('admin.jobRequestStatuses.index', compact('jobRequestStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_request_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobRequestStatuses.create');
    }

    public function store(StoreJobRequestStatusRequest $request)
    {
        $jobRequestStatus = JobRequestStatus::create($request->all());

        return redirect()->route('admin.job-request-statuses.index');
    }

    public function edit(JobRequestStatus $jobRequestStatus)
    {
        abort_if(Gate::denies('job_request_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobRequestStatuses.edit', compact('jobRequestStatus'));
    }

    public function update(UpdateJobRequestStatusRequest $request, JobRequestStatus $jobRequestStatus)
    {
        $jobRequestStatus->update($request->all());

        return redirect()->route('admin.job-request-statuses.index');
    }

    public function show(JobRequestStatus $jobRequestStatus)
    {
        abort_if(Gate::denies('job_request_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequestStatus->load('requestStatusJobRequests', 'statusTndpImsOltProfiles', 'requestStatusOltJobRequests');

        return view('admin.jobRequestStatuses.show', compact('jobRequestStatus'));
    }

    public function destroy(JobRequestStatus $jobRequestStatus)
    {
        abort_if(Gate::denies('job_request_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequestStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequestStatusRequest $request)
    {
        JobRequestStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
