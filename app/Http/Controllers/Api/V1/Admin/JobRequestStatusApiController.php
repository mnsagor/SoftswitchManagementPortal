<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequestStatusRequest;
use App\Http\Requests\UpdateJobRequestStatusRequest;
use App\Http\Resources\Admin\JobRequestStatusResource;
use App\Models\JobRequestStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobRequestStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_request_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobRequestStatusResource(JobRequestStatus::all());
    }

    public function store(StoreJobRequestStatusRequest $request)
    {
        $jobRequestStatus = JobRequestStatus::create($request->all());

        return (new JobRequestStatusResource($jobRequestStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobRequestStatus $jobRequestStatus)
    {
        abort_if(Gate::denies('job_request_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobRequestStatusResource($jobRequestStatus);
    }

    public function update(UpdateJobRequestStatusRequest $request, JobRequestStatus $jobRequestStatus)
    {
        $jobRequestStatus->update($request->all());

        return (new JobRequestStatusResource($jobRequestStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobRequestStatus $jobRequestStatus)
    {
        abort_if(Gate::denies('job_request_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequestStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
