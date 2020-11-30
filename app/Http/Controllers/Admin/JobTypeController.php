<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJobTypeRequest;
use App\Http\Requests\StoreJobTypeRequest;
use App\Http\Requests\UpdateJobTypeRequest;
use App\Models\JobType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('job_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobTypes = JobType::all();

        return view('admin.jobTypes.index', compact('jobTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobTypes.create');
    }

    public function store(StoreJobTypeRequest $request)
    {
        $jobType = JobType::create($request->all());

        return redirect()->route('admin.job-types.index');
    }

    public function edit(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobTypes.edit', compact('jobType'));
    }

    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        $jobType->update($request->all());

        return redirect()->route('admin.job-types.index');
    }

    public function show(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobType->load('jobTypeJobRequests', 'jobTypeTndpImsOltProfiles', 'jobTypeOltJobRequests');

        return view('admin.jobTypes.show', compact('jobType'));
    }

    public function destroy(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobType->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobTypeRequest $request)
    {
        JobType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
