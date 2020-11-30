@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tndpImsOltProfile.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-olt-profiles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.olt_name') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->olt_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.job_type') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->job_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.device_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsOltProfile::DEVICE_TYPE_SELECT[$tndpImsOltProfile->device_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.no_of_ports') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsOltProfile::NO_OF_PORTS_SELECT[$tndpImsOltProfile->no_of_ports] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.serial_number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->serial_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.interface') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->interface }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.ip') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.service') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsOltProfile::SERVICE_SELECT[$tndpImsOltProfile->service] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsOltProfile->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsOltProfile.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $tndpImsOltProfile->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-olt-profiles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection