@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requestType.fields.id') }}
                        </th>
                        <td>
                            {{ $requestType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestType.fields.name') }}
                        </th>
                        <td>
                            {{ $requestType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\RequestType::IS_ACTIVE_RADIO[$requestType->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-types.index') }}">
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
            <a class="nav-link" href="#request_type_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.jobRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#request_type_olt_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.oltJobRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="request_type_job_requests">
            @includeIf('admin.requestTypes.relationships.requestTypeJobRequests', ['jobRequests' => $requestType->requestTypeJobRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="request_type_olt_job_requests">
            @includeIf('admin.requestTypes.relationships.requestTypeOltJobRequests', ['oltJobRequests' => $requestType->requestTypeOltJobRequests])
        </div>
    </div>
</div>

@endsection