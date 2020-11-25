@extends('layouts.admin')
@section('content')
<div class="content">
    @can('job_type_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.job-types.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.jobType.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'JobType', 'route' => 'admin.job-types.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.jobType.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-JobType">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.jobType.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobType.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jobType.fields.is_active') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\JobType::IS_ACTIVE_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobTypes as $key => $jobType)
                                    <tr data-entry-id="{{ $jobType->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $jobType->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jobType->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\JobType::IS_ACTIVE_RADIO[$jobType->is_active] ?? '' }}
                                        </td>
                                        <td>
                                            @can('job_type_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.job-types.show', $jobType->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('job_type_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.job-types.edit', $jobType->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('job_type_delete')
                                                <form action="{{ route('admin.job-types.destroy', $jobType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('job_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.job-types.massDestroy') }}",
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
  let table = $('.datatable-JobType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection