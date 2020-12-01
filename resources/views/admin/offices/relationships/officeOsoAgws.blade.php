<div class="content">
    @can('oso_agw_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.oso-agws.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.osoAgw.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.osoAgw.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-officeOsoAgws">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.ip') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.office') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.is_active') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($osoAgws as $key => $osoAgw)
                                    <tr data-entry-id="{{ $osoAgw->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $osoAgw->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoAgw->ip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoAgw->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $osoAgw->office->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OsoAgw::IS_ACTIVE_RADIO[$osoAgw->is_active] ?? '' }}
                                        </td>
                                        <td>
                                            @can('oso_agw_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.oso-agws.show', $osoAgw->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('oso_agw_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.oso-agws.edit', $osoAgw->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('oso_agw_delete')
                                                <form action="{{ route('admin.oso-agws.destroy', $osoAgw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('oso_agw_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.oso-agws.massDestroy') }}",
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
  let table = $('.datatable-officeOsoAgws:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection