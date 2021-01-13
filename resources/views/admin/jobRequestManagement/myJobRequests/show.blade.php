@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.jobRequest.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.job-requests.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.id') }}
                                </th>
                                <td>
                                    {{ $jobRequest->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.network_type') }}
                                </th>
                                <td>
                                    {{ $jobRequest->network_type->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.job_type') }}
                                </th>
                                <td>
                                    {{ $jobRequest->job_type->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.request_type') }}
                                </th>
                                <td>
                                    {{ $jobRequest->request_type->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.request_status') }}
                                </th>
                                <td>
                                    {{ $jobRequest->request_status->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.number') }}
                                </th>
                                <td>
                                    {{ $jobRequest->number }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.agw_ip') }}
                                </th>
                                <td>
                                    {{ $jobRequest->agw_ip }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.tid') }}
                                </th>
                                <td>
                                    {{ $jobRequest->tid }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.note') }}
                                </th>
                                <td>
                                    {!! $jobRequest->note !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.file') }}
                                </th>
                                <td>
                                    @foreach($jobRequest->file as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.call_source_code') }}
                                </th>
                                <td>
                                    {{ $jobRequest->call_source_code->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.requested_by') }}
                                </th>
                                <td>
                                    {{ $jobRequest->requested_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.request_time') }}
                                </th>
                                <td>
                                    {{ $jobRequest->request_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.verified_by') }}
                                </th>
                                <td>
                                    {{ $jobRequest->verified_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.verification_time') }}
                                </th>
                                <td>
                                    {{ $jobRequest->verification_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.approved_by') }}
                                </th>
                                <td>
                                    {{ $jobRequest->approved_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.approval_time') }}
                                </th>
                                <td>
                                    {{ $jobRequest->approval_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.approval_note') }}
                                </th>
                                <td>
                                    {!! $jobRequest->approval_note !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.rejected_by') }}
                                </th>
                                <td>
                                    {{ $jobRequest->rejected_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.rejection_time') }}
                                </th>
                                <td>
                                    {{ $jobRequest->rejection_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.rejection_note') }}
                                </th>
                                <td>
                                    {!! $jobRequest->rejection_note !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.script') }}
                                </th>
                                <td>
                                    {{ $jobRequest->script }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.jobRequest.fields.is_force_request') }}
                                </th>
                                <td>
                                    {{ App\Models\JobRequest::IS_FORCE_REQUEST_SELECT[$jobRequest->is_force_request] ?? '' }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.job-requests.index') }}">
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
