@extends('layouts.admin')
@section('content')
<div class="content">
    @can('olt_job_request_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.olt-job-requests.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.oltJobRequest.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'OltJobRequest', 'route' => 'admin.olt-job-requests.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.oltJobRequest.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OltJobRequest">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.network_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.job_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.request_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.request_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.olt_ip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.interface') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.service_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.port_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.device_ip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.requested_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.request_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.verified_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.verification_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.approved_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.approval_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.rejected_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.rejection_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oltJobRequest.fields.script') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($network_types as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($job_types as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($request_types as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($job_request_statuses as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($olts as $key => $item)
                                            <option value="{{ $item->ip }}">{{ $item->ip }}</option>
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
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OltJobRequest::SERVICE_TYPE_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
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
                                </td>
                            </tr>
                        </thead>
                    </table>
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
@can('olt_job_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.olt-job-requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.olt-job-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'network_type_name', name: 'network_type.name' },
{ data: 'job_type_name', name: 'job_type.name' },
{ data: 'request_type_name', name: 'request_type.name' },
{ data: 'request_status_name', name: 'request_status.name' },
{ data: 'olt_ip_ip', name: 'olt_ip.ip' },
{ data: 'number', name: 'number' },
{ data: 'interface', name: 'interface' },
{ data: 'service_type', name: 'service_type' },
{ data: 'port_number', name: 'port_number' },
{ data: 'device_ip', name: 'device_ip' },
{ data: 'requested_by_name', name: 'requested_by.name' },
{ data: 'request_time', name: 'request_time' },
{ data: 'verified_by_name', name: 'verified_by.name' },
{ data: 'verification_time', name: 'verification_time' },
{ data: 'approved_by_name', name: 'approved_by.name' },
{ data: 'approval_time', name: 'approval_time' },
{ data: 'rejected_by_name', name: 'rejected_by.name' },
{ data: 'rejection_time', name: 'rejection_time' },
{ data: 'script', name: 'script' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-OltJobRequest').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection