@extends('layouts.admin')
@section('content')
<div class="content">
    @can('oso_number_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.oso-number-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.osoNumberProfile.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'OsoNumberProfile', 'route' => 'admin.oso-number-profiles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.osoNumberProfile.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OsoNumberProfile">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.oso_agw_ip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.oso_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_active') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_td') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_isd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_eisd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_pbx') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.pbx_poilot_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.request_controller') }}
                                </th>
                                <th>
                                    {{ trans('cruds.osoNumberProfile.fields.is_queued') }}
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
                                        @foreach($oso_agws as $key => $item)
                                            <option value="{{ $item->ip }}">{{ $item->ip }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($oso_numbers as $key => $item)
                                            <option value="{{ $item->number }}">{{ $item->number }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_ACTIVE_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_TD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_ISD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_EISD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_PBX_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::REQUEST_CONTROLLER_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\OsoNumberProfile::IS_QUEUED_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
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
@can('oso_number_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.oso-number-profiles.massDestroy') }}",
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
    ajax: "{{ route('admin.oso-number-profiles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'oso_agw_ip_ip', name: 'oso_agw_ip.ip' },
{ data: 'number_number', name: 'number.number' },
{ data: 'oso_number', name: 'oso_number' },
{ data: 'is_active', name: 'is_active' },
{ data: 'is_td', name: 'is_td' },
{ data: 'is_isd', name: 'is_isd' },
{ data: 'is_eisd', name: 'is_eisd' },
{ data: 'is_pbx', name: 'is_pbx' },
{ data: 'pbx_poilot_number', name: 'pbx_poilot_number' },
{ data: 'request_controller', name: 'request_controller' },
{ data: 'is_queued', name: 'is_queued' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-OsoNumberProfile').DataTable(dtOverrideGlobals);
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