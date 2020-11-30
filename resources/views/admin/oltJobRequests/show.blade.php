@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.oltJobRequest.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.olt-job-requests.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.network_type') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->network_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.job_type') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->job_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.request_type') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->request_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.request_status') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->request_status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.olt_ip') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->olt_ip->ip ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.interface') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->interface }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.service_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OltJobRequest::SERVICE_TYPE_SELECT[$oltJobRequest->service_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.device_ip') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->device_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.note') }}
                                    </th>
                                    <td>
                                        {!! $oltJobRequest->note !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.file') }}
                                    </th>
                                    <td>
                                        @foreach($oltJobRequest->file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.requested_by') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->requested_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.request_time') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->request_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.verified_by') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->verified_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.verification_time') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->verification_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.approved_by') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->approved_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.approval_time') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->approval_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.approval_note') }}
                                    </th>
                                    <td>
                                        {!! $oltJobRequest->approval_note !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.rejected_by') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->rejected_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.rejection_time') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->rejection_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.rejection_note') }}
                                    </th>
                                    <td>
                                        {!! $oltJobRequest->rejection_note !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oltJobRequest.fields.script') }}
                                    </th>
                                    <td>
                                        {{ $oltJobRequest->script }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.olt-job-requests.index') }}">
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