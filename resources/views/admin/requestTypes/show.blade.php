@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.requestType.title') }}
                </div>
                <div class="panel-body">
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#request_type_job_requests" aria-controls="request_type_job_requests" role="tab" data-toggle="tab">
                            {{ trans('cruds.jobRequest.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="request_type_job_requests">
                        @includeIf('admin.requestTypes.relationships.requestTypeJobRequests', ['jobRequests' => $requestType->requestTypeJobRequests])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection