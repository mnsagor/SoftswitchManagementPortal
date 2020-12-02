<div class="content">
    @can('oso_number_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.oso-number-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.osoNumberProfile.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-numberOsoNumberProfiles">
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
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($osoNumberProfiles as $key => $osoNumberProfile)
                                    <tr data-entry-id="{{ $osoNumberProfile->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $osoNumberProfile->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoNumberProfile->oso_agw_ip->ip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoNumberProfile->number->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoNumberProfile->oso_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoNumberProfile::IS_ACTIVE_RADIO[$osoNumberProfile->is_active] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoNumberProfile::IS_TD_RADIO[$osoNumberProfile->is_td] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoNumberProfile::IS_ISD_RADIO[$osoNumberProfile->is_isd] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoNumberProfile::IS_EISD_RADIO[$osoNumberProfile->is_eisd] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoNumberProfile::IS_PBX_RADIO[$osoNumberProfile->is_pbx] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoNumberProfile->pbx_poilot_number ?? '' }}
                                        </td>
                                        <td>
                                            @can('oso_number_profile_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.oso-number-profiles.show', $osoNumberProfile->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('oso_number_profile_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.oso-number-profiles.edit', $osoNumberProfile->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('oso_number_profile_delete')
                                                <form action="{{ route('admin.oso-number-profiles.destroy', $osoNumberProfile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('oso_number_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.oso-number-profiles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-numberOsoNumberProfiles:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection