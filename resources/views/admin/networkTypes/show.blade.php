@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.networkType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.network-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.networkType.fields.id') }}
                        </th>
                        <td>
                            {{ $networkType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.networkType.fields.name') }}
                        </th>
                        <td>
                            {{ $networkType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.networkType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\NetworkType::IS_ACTIVE_RADIO[$networkType->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.network-types.index') }}">
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
            <a class="nav-link" href="#network_type_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.jobRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#network_type_olt_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.oltJobRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="network_type_job_requests">
            @includeIf('admin.networkTypes.relationships.networkTypeJobRequests', ['jobRequests' => $networkType->networkTypeJobRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="network_type_olt_job_requests">
            @includeIf('admin.networkTypes.relationships.networkTypeOltJobRequests', ['oltJobRequests' => $networkType->networkTypeOltJobRequests])
        </div>
    </div>
</div>

@endsection