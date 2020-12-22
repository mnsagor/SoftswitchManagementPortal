@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.networkType.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-NetworkType">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.networkType.fields.id') }}
                                    </th>
                                    <th>
                                        &nbsp;{{"Action"}}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.network_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.job_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.request_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.request_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.agw_ip') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobRequest.fields.tid') }}
                                    </th>

                                    <th>
                                    {{ trans('cruds.jobRequest.fields.requested_by') }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(\App\Models\NetworkType::all() as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
{{--                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\JobType::all() as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\RequestType::all() as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\JobRequestStatus::all() as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\User::all() as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $increment=1;
                                @endphp
                                @foreach($jobRequests as $key => $jobRequest)
                                    <tr data-entry-id="{{ $jobRequest->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            @if(!$increment == 0)
                                                {{$increment}}
                                                @php
                                                    $increment++;
                                                @endphp
                                            @endif
                                        </td>
                                        <td>
                                            @can('job_request_authentication_access')
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('admin.job-request-authentications.show', $jobRequest->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('job_request_authentication_authenticate')
                                                <a class="btn btn-xs btn-success" href="{{ route('admin.job-requests.authenticate', $jobRequest->id) }}">
                                                    {{ "Authenticate" }}
                                                </a>
                                            @endcan
                                            @can('job_request_authentication_reject')
                                                <form action="{{ route('admin.job-requests.reject', $jobRequest->id) }}"
                                                      method="GET"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-warning"
                                                           value="{{ "Reject" }}">
                                                </form>
                                            @endcan

                                            {{--                                            @can('network_type_delete')--}}
                                            {{--                                                <form action="{{ route('admin.network-types.destroy', $networkType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                                            {{--                                                    <input type="hidden" name="_method" value="DELETE">--}}
                                            {{--                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                            {{--                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                                            {{--                                                </form>--}}
                                            {{--                                            @endcan--}}

                                        </td>
                                        <td>
                                            {{$jobRequest->network_type->name ?? ''}}
                                        </td>
                                        <td>
                                            {{ $jobRequest->job_type->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobRequest->request_type->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobRequest->request_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobRequest->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobRequest->agw_ip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobRequest->tid ?? '' }}
                                        </td>

                                        <td>
                                            {{ $jobRequest->requested_by->name ?? '' }}
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-NetworkType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value
                table
                    .column($(this).parent().index())
                    .search(value, strict)
                    .draw()
            });
        })

    </script>
@endsection


{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--<div class="content">--}}

{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">--}}
{{--                    {{ trans('cruds.jobRequestAuthenticatioin.title') }}--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class=" table table-bordered table-striped table-hover datatable datatable-JobRequest">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th width="10">--}}

{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.id') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.network_type') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.job_type') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.request_type') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.request_status') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.number') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.agw_ip') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.tid') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    {{ trans('cruds.jobRequest.fields.requested_by') }}--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    &nbsp;{{"Action"}}--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}

{{--                                </td>--}}

{{--                                <td>--}}

{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        Network type--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}


{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        Job Type--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        Request Type--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        Request Status--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        Number--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        agw ip--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    --}}{{--                                        tid--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}
{{--                                <td>--}}

{{--                                    --}}{{--                                        requested By--}}
{{--                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                                </td>--}}

{{--                                <td>--}}

{{--                                </td>--}}
{{--                            </tr>--}}
{{--                         </thead>--}}
{{--                            <tbody>--}}
{{--                            @php--}}
{{--                                $increment=1;--}}
{{--                            @endphp--}}
{{--                            @foreach($jobRequests as $key => $jobRequest)--}}
{{--                                <tr data-entry-id="{{ $jobRequest->id }}">--}}
{{--                                    <td>--}}

{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        @if(!$increment == 0)--}}
{{--                                        {{$increment}}--}}
{{--                                        @php--}}
{{--                                            $increment++;--}}
{{--                                        @endphp--}}
{{--                                            @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        Network type--}}
{{--                                        {{$jobRequest->network_type->name ?? ''}}--}}


{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        Job Type--}}
{{--                                        {{ $jobRequest->job_type->name ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        Request Type--}}
{{--                                        {{ $jobRequest->request_type->name ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        Request Status--}}
{{--                                        {{ $jobRequest->request_status->name ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        Number--}}
{{--                                        {{ $jobRequest->number ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        agw ip--}}
{{--                                        {{ $jobRequest->agw_ip ?? '' }}--}}

{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        tid--}}
{{--                                        {{ $jobRequest->tid ?? '' }}--}}

{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        requested By--}}
{{--                                        {{ $jobRequest->requested_by->name ?? '' }}--}}
{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        @can('job_request_authenticatioin_access')--}}
{{--                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.job-request-authenticatioins.show', $jobRequest->id) }}">--}}
{{--                                                {{ trans('global.view') }}--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}

{{--                                        @can('job_request_authentication_approve')--}}
{{--                                            <a class="btn btn-xs btn-success" href="{{ route('admin.job-requests.authenticate', $jobRequest->id) }}">--}}
{{--                                                {{ "Authenticate" }}--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}
{{--                                        @can('job_request_authentication_reject')--}}
{{--                                            <form action="{{ route('admin.job-requests.reject', $jobRequest->id) }}" method="GET" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                                                                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                                <input type="submit" class="btn btn-xs btn-warning" value="{{ "Reject" }}">--}}
{{--                                            </form>--}}
{{--                                                                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.job-requests.reject', $jobRequest->id) }}">--}}
{{--                                                                                        {{ "Reject" }}--}}
{{--                                                                                    </a>--}}
{{--                                        @endcan--}}
{{--                                        @can('job_request_delete')--}}
{{--                                            <form action="{{ route('admin.job-requests.destroy', $jobRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                                <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
{{--                                            </form>--}}
{{--                                        @endcan--}}

{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                                {{dd($jobRequest)}}--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
{{--@section('scripts')--}}
{{--    @parent--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
{{--                @can('network_type_delete')--}}
{{--            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
{{--            let deleteButton = {--}}
{{--                text: deleteButtonTrans,--}}
{{--                url: "{{ route('admin.network-types.massDestroy') }}",--}}
{{--                className: 'btn-danger',--}}
{{--                action: function (e, dt, node, config) {--}}
{{--                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
{{--                        return $(entry).data('entry-id')--}}
{{--                    });--}}

{{--                    if (ids.length === 0) {--}}
{{--                        alert('{{ trans('global.datatables.zero_selected') }}')--}}

{{--                        return--}}
{{--                    }--}}

{{--                    if (confirm('{{ trans('global.areYouSure') }}')) {--}}
{{--                        $.ajax({--}}
{{--                            headers: {'x-csrf-token': _token},--}}
{{--                            method: 'POST',--}}
{{--                            url: config.url,--}}
{{--                            data: { ids: ids, _method: 'DELETE' }})--}}
{{--                            .done(function () { location.reload() })--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--            dtButtons.push(deleteButton)--}}
{{--            @endcan--}}

{{--            $.extend(true, $.fn.dataTable.defaults, {--}}
{{--                orderCellsTop: true,--}}
{{--                order: [[ 1, 'desc' ]],--}}
{{--                pageLength: 100,--}}
{{--            });--}}
{{--            let table = $('.datatable-NetworkType:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
{{--            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){--}}
{{--                $($.fn.dataTable.tables(true)).DataTable()--}}
{{--                    .columns.adjust();--}}
{{--            });--}}
{{--            $('.datatable thead').on('input', '.search', function () {--}}
{{--                let strict = $(this).attr('strict') || false--}}
{{--                let value = strict && this.value ? "^" + this.value + "$" : this.value--}}
{{--                table--}}
{{--                    .column($(this).parent().index())--}}
{{--                    .search(value, strict)--}}
{{--                    .draw()--}}
{{--            });--}}
{{--        })--}}

{{--    </script>--}}
{{--@endsection--}}
