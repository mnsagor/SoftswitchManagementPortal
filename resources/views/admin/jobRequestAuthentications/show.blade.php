@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-7">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ "Job Request Details" }}</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
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

{{--                            if the approval status is pending then this button will appeared.--}}
{{--                            Status for pending--}}
                            @if($jobRequest->request_status->id == 1)

                            <div class="text-center">
{{--                                @can('job_request_authentication_approve')--}}
{{--                                    <a class="btn btn-success"--}}
{{--                                       href="{{ route('admin.job-requests.authenticate', $jobRequestInfo->id) }}">--}}
{{--                                        {{ 'Authenticate' }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}
{{--                                    @can('job_request_authentication_reject')--}}
{{--                                        <form action="{{ route('admin.job-requests.reject', $jobRequestInfo->id) }}" method="GET" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                            <input type="submit" class="btn btn btn-danger" value="{{ "Reject" }}">--}}
{{--                                        </form>--}}
{{--                                    @endcan--}}
                            </div>
                            @endif


                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>

                        </div>

                        <ul class="nav nav-tabs">

                        </ul>
                        <div class="tab-content">

                        </div>
                    </div>
                </div>

            </div>

{{--area for user given input--}}
{{--            <div class="col-lg-5">--}}
{{--                <div class="box box-primary">--}}
{{--                    <div class="box-header with-border">--}}
{{--                        <h3 class="box-title">Deposit Slip Image</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-header -->--}}
{{--                    <div class="box-body">--}}

{{--                        @if($depositDetail->deposit_image)--}}
{{--                            <a href="{{ asset($depositDetail->deposit_image) }}" target="_blank">--}}
{{--                                <img src="{{ asset($depositDetail->deposit_image)}}" width="500px" height="500px">--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                        <hr>--}}

{{--                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>--}}

{{--                        <p class="text-muted">--}}
{{--                            {{ $depositDetail->description }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-body -->--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
@endsection
