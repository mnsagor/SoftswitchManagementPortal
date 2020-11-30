@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.username') }}
                                    </th>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.payroll_emp') }}
                                    </th>
                                    <td>
                                        {{ $user->payroll_emp->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $user->designation->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.approved') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="label label-info">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.office') }}
                                    </th>
                                    <td>
                                        @foreach($user->offices as $key => $office)
                                            <span class="label label-info">{{ $office->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#requested_by_job_requests" aria-controls="requested_by_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.jobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#verified_by_job_requests" aria-controls="verified_by_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.jobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#approved_by_job_requests" aria-controls="approved_by_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.jobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#rejected_by_job_requests" aria-controls="rejected_by_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.jobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#requested_by_olt_job_requests" aria-controls="requested_by_olt_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.oltJobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#verified_by_olt_job_requests" aria-controls="verified_by_olt_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.oltJobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#approved_by_olt_job_requests" aria-controls="approved_by_olt_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.oltJobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#rejected_by_olt_job_requests" aria-controls="rejected_by_olt_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.oltJobRequest.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_user_alerts" aria-controls="user_user_alerts" role="tab" data-toggle="tab">
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="requested_by_job_requests">
                        @includeIf('admin.users.relationships.requestedByJobRequests', ['jobRequests' => $user->requestedByJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="verified_by_job_requests">
                        @includeIf('admin.users.relationships.verifiedByJobRequests', ['jobRequests' => $user->verifiedByJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="approved_by_job_requests">
                        @includeIf('admin.users.relationships.approvedByJobRequests', ['jobRequests' => $user->approvedByJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="rejected_by_job_requests">
                        @includeIf('admin.users.relationships.rejectedByJobRequests', ['jobRequests' => $user->rejectedByJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="requested_by_olt_job_requests">
                        @includeIf('admin.users.relationships.requestedByOltJobRequests', ['oltJobRequests' => $user->requestedByOltJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="verified_by_olt_job_requests">
                        @includeIf('admin.users.relationships.verifiedByOltJobRequests', ['oltJobRequests' => $user->verifiedByOltJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="approved_by_olt_job_requests">
                        @includeIf('admin.users.relationships.approvedByOltJobRequests', ['oltJobRequests' => $user->approvedByOltJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="rejected_by_olt_job_requests">
                        @includeIf('admin.users.relationships.rejectedByOltJobRequests', ['oltJobRequests' => $user->rejectedByOltJobRequests])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                        @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection