<div class="m-3">
    @can('tndp_ims_agw_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-agws.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsAgw.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tndpImsAgw.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-officeTndpImsAgws">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.tndpImsAgw.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.tndpImsAgw.fields.ip') }}
                            </th>
                            <th>
                                {{ trans('cruds.tndpImsAgw.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.tndpImsAgw.fields.office') }}
                            </th>
                            <th>
                                {{ trans('cruds.tndpImsAgw.fields.is_active') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tndpImsAgws as $key => $tndpImsAgw)
                            <tr data-entry-id="{{ $tndpImsAgw->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $tndpImsAgw->id ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsAgw->ip ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsAgw->name ?? '' }}
                                </td>
                                <td>
                                    {{ $tndpImsAgw->office->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\TndpImsAgw::IS_ACTIVE_RADIO[$tndpImsAgw->is_active] ?? '' }}
                                </td>
                                <td>
                                    @can('tndp_ims_agw_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tndp-ims-agws.show', $tndpImsAgw->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('tndp_ims_agw_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.tndp-ims-agws.edit', $tndpImsAgw->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('tndp_ims_agw_delete')
                                        <form action="{{ route('admin.tndp-ims-agws.destroy', $tndpImsAgw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tndp_ims_agw_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-agws.massDestroy') }}",
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
  let table = $('.datatable-officeTndpImsAgws:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection