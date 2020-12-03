<div class="content">
    @can('tndp_ims_number_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-number-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsNumberProfile.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-tndpAgwIpTndpImsNumberProfiles">
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
                                        {{ trans('cruds.tndpImsNumberProfile.fields.request_controller') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_queued') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tndpImsNumberProfiles as $key => $tndpImsNumberProfile)
                                    <tr data-entry-id="{{ $tndpImsNumberProfile->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $tndpImsNumberProfile->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumberProfile->tndp_agw_ip->ip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumberProfile->number->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumberProfile->tndp_ims_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_ACTIVE_RADIO[$tndpImsNumberProfile->is_active] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_TD_RADIO[$tndpImsNumberProfile->is_td] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_ISD_RADIO[$tndpImsNumberProfile->is_isd] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_EISD_RADIO[$tndpImsNumberProfile->is_eisd] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_PBX_RADIO[$tndpImsNumberProfile->is_pbx] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumberProfile->pbx_poilot_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::REQUEST_CONTROLLER_RADIO[$tndpImsNumberProfile->request_controller] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TndpImsNumberProfile::IS_QUEUED_RADIO[$tndpImsNumberProfile->is_queued] ?? '' }}
                                        </td>
                                        <td>
                                            @can('tndp_ims_number_profile_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.tndp-ims-number-profiles.show', $tndpImsNumberProfile->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('tndp_ims_number_profile_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.tndp-ims-number-profiles.edit', $tndpImsNumberProfile->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('tndp_ims_number_profile_delete')
                                                <form action="{{ route('admin.tndp-ims-number-profiles.destroy', $tndpImsNumberProfile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tndp_ims_number_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-number-profiles.massDestroy') }}",
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
  let table = $('.datatable-tndpAgwIpTndpImsNumberProfiles:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection