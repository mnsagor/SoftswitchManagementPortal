@extends('layouts.admin')
@section('content')
<div class="content">
    @can('tndp_ims_olt_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-olt-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsOltProfile.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'TndpImsOltProfile', 'route' => 'admin.tndp-ims-olt-profiles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.tndpImsOltProfile.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-TndpImsOltProfile">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.olt_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.job_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.device_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.no_of_ports') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.serial_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.interface') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.ip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.port_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.service') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsOltProfile.fields.status') }}
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
                                        @foreach($olts as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
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
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsOltProfile::DEVICE_TYPE_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsOltProfile::NO_OF_PORTS_SELECT as $key => $item)
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
                                        @foreach(App\Models\TndpImsOltProfile::SERVICE_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
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
@can('tndp_ims_olt_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-olt-profiles.massDestroy') }}",
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
    ajax: "{{ route('admin.tndp-ims-olt-profiles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'olt_name_name', name: 'olt_name.name' },
{ data: 'date', name: 'date' },
{ data: 'job_type_name', name: 'job_type.name' },
{ data: 'device_type', name: 'device_type' },
{ data: 'no_of_ports', name: 'no_of_ports' },
{ data: 'serial_number', name: 'serial_number' },
{ data: 'interface', name: 'interface' },
{ data: 'ip', name: 'ip' },
{ data: 'number', name: 'number' },
{ data: 'port_number', name: 'port_number' },
{ data: 'service', name: 'service' },
{ data: 'status_name', name: 'status.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-TndpImsOltProfile').DataTable(dtOverrideGlobals);
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