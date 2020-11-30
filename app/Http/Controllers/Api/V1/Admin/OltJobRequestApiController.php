<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOltJobRequestRequest;
use App\Http\Requests\UpdateOltJobRequestRequest;
use App\Http\Resources\Admin\OltJobRequestResource;
use App\Models\OltJobRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OltJobRequestApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('olt_job_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OltJobRequestResource(OltJobRequest::with(['network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by'])->get());
    }

    public function store(StoreOltJobRequestRequest $request)
    {
        $oltJobRequest = OltJobRequest::create($request->all());

        if ($request->input('file', false)) {
            $oltJobRequest->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new OltJobRequestResource($oltJobRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OltJobRequest $oltJobRequest)
    {
        abort_if(Gate::denies('olt_job_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OltJobRequestResource($oltJobRequest->load(['network_type', 'job_type', 'request_type', 'request_status', 'olt_ip', 'requested_by', 'verified_by', 'approved_by', 'rejected_by']));
    }

    public function update(UpdateOltJobRequestRequest $request, OltJobRequest $oltJobRequest)
    {
        $oltJobRequest->update($request->all());

        if ($request->input('file', false)) {
            if (!$oltJobRequest->file || $request->input('file') !== $oltJobRequest->file->file_name) {
                if ($oltJobRequest->file) {
                    $oltJobRequest->file->delete();
                }

                $oltJobRequest->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($oltJobRequest->file) {
            $oltJobRequest->file->delete();
        }

        return (new OltJobRequestResource($oltJobRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OltJobRequest $oltJobRequest)
    {
        abort_if(Gate::denies('olt_job_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oltJobRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
