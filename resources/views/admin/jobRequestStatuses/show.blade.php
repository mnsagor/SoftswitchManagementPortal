@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobRequestStatus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-request-statuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobRequestStatus.fields.id') }}
                        </th>
                        <td>
                            {{ $jobRequestStatus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobRequestStatus.fields.name') }}
                        </th>
                        <td>
                            {{ $jobRequestStatus->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobRequestStatus.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\JobRequestStatus::IS_ACTIVE_RADIO[$jobRequestStatus->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-request-statuses.index') }}">
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
            <a class="nav-link" href="#request_status_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.jobRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#status_tndp_ims_olt_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.tndpImsOltProfile.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#request_status_olt_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.oltJobRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="request_status_job_requests">
            @includeIf('admin.jobRequestStatuses.relationships.requestStatusJobRequests', ['jobRequests' => $jobRequestStatus->requestStatusJobRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="status_tndp_ims_olt_profiles">
            @includeIf('admin.jobRequestStatuses.relationships.statusTndpImsOltProfiles', ['tndpImsOltProfiles' => $jobRequestStatus->statusTndpImsOltProfiles])
        </div>
        <div class="tab-pane" role="tabpanel" id="request_status_olt_job_requests">
            @includeIf('admin.jobRequestStatuses.relationships.requestStatusOltJobRequests', ['oltJobRequests' => $jobRequestStatus->requestStatusOltJobRequests])
        </div>
    </div>
</div>

@endsection