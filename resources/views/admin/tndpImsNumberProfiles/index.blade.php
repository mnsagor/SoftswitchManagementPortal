@extends('layouts.admin')
@section('content')
<div class="content">
    @can('tndp_ims_number_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-number-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsNumberProfile.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'TndpImsNumberProfile', 'route' => 'admin.tndp-ims-number-profiles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.tndpImsNumberProfile.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-TndpImsNumberProfile">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.tndp_agw_ip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.tndp_ims_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.is_active') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.is_td') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.is_isd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.is_eisd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.is_pbx') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tndpImsNumberProfile.fields.pbx_poilot_number') }}
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
                                        @foreach($tndp_ims_agws as $key => $item)
                                            <option value="{{ $item->ip }}">{{ $item->ip }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($tndp_ims_numbers as $key => $item)
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
                                        @foreach(App\Models\TndpImsNumberProfile::IS_ACTIVE_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsNumberProfile::IS_TD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsNumberProfile::IS_ISD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsNumberProfile::IS_EISD_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\TndpImsNumberProfile::IS_PBX_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
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
@can('tndp_ims_number_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-number-profiles.massDestroy') }}",
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
    ajax: "{{ route('admin.tndp-ims-number-profiles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'tndp_agw_ip_ip', name: 'tndp_agw_ip.ip' },
{ data: 'number_number', name: 'number.number' },
{ data: 'tndp_ims_number', name: 'tndp_ims_number' },
{ data: 'is_active', name: 'is_active' },
{ data: 'is_td', name: 'is_td' },
{ data: 'is_isd', name: 'is_isd' },
{ data: 'is_eisd', name: 'is_eisd' },
{ data: 'is_pbx', name: 'is_pbx' },
{ data: 'pbx_poilot_number', name: 'pbx_poilot_number' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-TndpImsNumberProfile').DataTable(dtOverrideGlobals);
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