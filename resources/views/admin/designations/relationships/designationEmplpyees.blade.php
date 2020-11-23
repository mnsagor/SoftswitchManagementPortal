<div class="content">
    @can('emplpyee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.emplpyees.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.emplpyee.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.emplpyee.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-designationEmplpyees">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.designation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.office') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.payroll_emp') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.is_active') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emplpyees as $key => $emplpyee)
                                    <tr data-entry-id="{{ $emplpyee->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $emplpyee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->designation->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->office->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $emplpyee->payroll_emp ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Emplpyee::IS_ACTIVE_RADIO[$emplpyee->is_active] ?? '' }}
                                        </td>
                                        <td>
                                            @can('emplpyee_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.emplpyees.show', $emplpyee->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('emplpyee_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.emplpyees.edit', $emplpyee->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('emplpyee_delete')
                                                <form action="{{ route('admin.emplpyees.destroy', $emplpyee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('emplpyee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.emplpyees.massDestroy') }}",
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
  let table = $('.datatable-designationEmplpyees:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection