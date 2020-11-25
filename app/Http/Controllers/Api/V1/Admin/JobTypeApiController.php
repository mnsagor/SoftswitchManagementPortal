<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTypeRequest;
use App\Http\Requests\UpdateJobTypeRequest;
use App\Http\Resources\Admin\JobTypeResource;
use App\Models\JobType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobTypeResource(JobType::all());
    }

    public function store(StoreJobTypeRequest $request)
    {
        $jobType = JobType::create($request->all());

        return (new JobTypeResource($jobType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobTypeResource($jobType);
    }

    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        $jobType->update($request->all());

        return (new JobTypeResource($jobType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
