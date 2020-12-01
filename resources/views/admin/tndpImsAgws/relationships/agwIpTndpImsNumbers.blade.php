<div class="content">
    @can('tndp_ims_number_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tndp-ims-numbers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tndpImsNumber.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.tndpImsNumber.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-agwIpTndpImsNumbers">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.tid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.agw_ip') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tndpImsNumbers as $key => $tndpImsNumber)
                                    <tr data-entry-id="{{ $tndpImsNumber->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $tndpImsNumber->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumber->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumber->tid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tndpImsNumber->agw_ip->ip ?? '' }}
                                        </td>
                                        <td>
                                            @can('tndp_ims_number_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.tndp-ims-numbers.show', $tndpImsNumber->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('tndp_ims_number_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.tndp-ims-numbers.edit', $tndpImsNumber->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('tndp_ims_number_delete')
                                                <form action="{{ route('admin.tndp-ims-numbers.destroy', $tndpImsNumber->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tndp_ims_number_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tndp-ims-numbers.massDestroy') }}",
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
  let table = $('.datatable-agwIpTndpImsNumbers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection