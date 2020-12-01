<div class="m-3">
    @can('tndp_ims_olt_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-olt-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsOltProfile.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tndpImsOltProfile.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-oltNameTndpImsOltProfiles">
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
                    </thead>
                    <tbody>
                        @foreach($tndpImsOltProfiles as $key => $tndpImsOltProfile)
                            <tr data-entry-id="{{ $tndpImsOltProfile->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->id ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->olt_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->date ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->job_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\TndpImsOltProfile::DEVICE_TYPE_SELECT[$tndpImsOltProfile->device_type] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\TndpImsOltProfile::NO_OF_PORTS_SELECT[$tndpImsOltProfile->no_of_ports] ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->serial_number ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->interface ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->ip ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->number ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->port_number ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\TndpImsOltProfile::SERVICE_SELECT[$tndpImsOltProfile->service] ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsOltProfile->status->name ?? '' }}
                                </td>
                                <td>
                                    @can('tndp_ims_olt_profile_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tndp-ims-olt-profiles.show', $tndpImsOltProfile->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('tndp_ims_olt_profile_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.tndp-ims-olt-profiles.edit', $tndpImsOltProfile->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('tndp_ims_olt_profile_delete')
                                        <form action="{{ route('admin.tndp-ims-olt-profiles.destroy', $tndpImsOltProfile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('tndp_ims_olt_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-olt-profiles.massDestroy') }}",
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
  let table = $('.datatable-oltNameTndpImsOltProfiles:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection