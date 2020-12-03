<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobRequestRequest;
use App\Http\Requests\UpdateJobRequestRequest;
use App\Http\Resources\Admin\JobRequestResource;
use App\Models\JobRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobRequestApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobRequestResource(JobRequest::with(['network_type', 'job_type', 'request_type', 'request_status', 'call_source_code', 'requested_by', 'verified_by', 'approved_by', 'rejected_by'])->get());
    }

    public function store(StoreJobRequestRequest $request)
    {
        $jobRequest = JobRequest::create($request->all());

        if ($request->input('file', false)) {
            $jobRequest->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new JobRequestResource($jobRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobRequest $jobRequest)
    {
        abort_if(Gate::denies('job_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobRequestResource($jobRequest->load(['network_type', 'job_type', 'request_type', 'request_status', 'call_source_code', 'requested_by', 'verified_by', 'approved_by', 'rejected_by']));
    }

    public function update(UpdateJobRequestRequest $request, JobRequest $jobRequest)
    {
        $jobRequest->update($request->all());

        if ($request->input('file', false)) {
            if (!$jobRequest->file || $request->input('file') !== $jobRequest->file->file_name) {
                if ($jobRequest->file) {
                    $jobRequest->file->delete();
                }

                $jobRequest->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($jobRequest->file) {
            $jobRequest->file->delete();
        }

        return (new JobRequestResource($jobRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobRequest $jobRequest)
    {
        abort_if(Gate::denies('job_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
