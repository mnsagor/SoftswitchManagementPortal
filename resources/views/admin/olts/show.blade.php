@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.olt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.olts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.olt.fields.id') }}
                        </th>
                        <td>
                            {{ $olt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.olt.fields.name') }}
                        </th>
                        <td>
                            {{ $olt->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.olt.fields.ip') }}
                        </th>
                        <td>
                            {{ $olt->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.olt.fields.vlan') }}
                        </th>
                        <td>
                            {{ $olt->vlan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.olts.index') }}">
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
            <a class="nav-link" href="#olt_name_tndp_ims_olt_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.tndpImsOltProfile.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#olt_ip_olt_job_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.oltJobRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="olt_name_tndp_ims_olt_profiles">
            @includeIf('admin.olts.relationships.oltNameTndpImsOltProfiles', ['tndpImsOltProfiles' => $olt->oltNameTndpImsOltProfiles])
        </div>
        <div class="tab-pane" role="tabpanel" id="olt_ip_olt_job_requests">
            @includeIf('admin.olts.relationships.oltIpOltJobRequests', ['oltJobRequests' => $olt->oltIpOltJobRequests])
        </div>
    </div>
</div>

@endsection