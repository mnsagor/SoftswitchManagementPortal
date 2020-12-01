@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.id') }}
                        </th>
                        <td>
                            {{ $jobType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.name') }}
                        </th>
                        <td>
                            {{ $jobType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\JobType::IS_ACTIVE_RADIO[$jobType->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#job_type_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.jobRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#job_type_tndp_ims_olt_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.tndpImsOltProfile.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#job_type_olt_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.oltJobRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="job_type_job_requests">
            @includeIf('admin.jobTypes.relationships.jobTypeJobRequests', ['jobRequests' => $jobType->jobTypeJobRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="job_type_tndp_ims_olt_profiles">
            @includeIf('admin.jobTypes.relationships.jobTypeTndpImsOltProfiles', ['tndpImsOltProfiles' => $jobType->jobTypeTndpImsOltProfiles])
        </div>
        <div class="tab-pane" role="tabpanel" id="job_type_olt_job_requests">
            @includeIf('admin.jobTypes.relationships.jobTypeOltJobRequests', ['oltJobRequests' => $jobType->jobTypeOltJobRequests])
        </div>
    </div>
</div>

@endsection