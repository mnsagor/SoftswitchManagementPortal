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
