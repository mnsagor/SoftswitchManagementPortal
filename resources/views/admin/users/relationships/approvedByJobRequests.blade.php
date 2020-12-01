<div class="m-3">
    @can('job_request_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.job-requests.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.jobRequest.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.jobRequest.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-approvedByJobRequests">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.network_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.job_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.request_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.request_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.number') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.agw_ip') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.tid') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.requested_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.request_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.verified_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.verification_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.approved_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.approval_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.rejected_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.rejection_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.script') }}
                            </th>
                            <th>
                                {{ trans('cruds.jobRequest.fields.is_force_request') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobRequests as $key => $jobRequest)
                            <tr data-entry-id="{{ $jobRequest->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $jobRequest->id ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->network_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->job_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->request_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->request_status->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->number ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->agw_ip ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->tid ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->requested_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->request_time ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->verified_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->verification_time ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->approved_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->approval_time ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->rejected_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->rejection_time ?? '' }}
                                </td>
                                <td>
                                    {{ $jobRequest->script ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\JobRequest::IS_FORCE_REQUEST_SELECT[$jobRequest->is_force_request] ?? '' }}
                                </td>
                                <td>
                                    @can('job_request_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.job-requests.show', $jobRequest->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('job_request_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.job-requests.edit', $jobRequest->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('job_request_delete')
                                        <form action="{{ route('admin.job-requests.destroy', $jobRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('job_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.job-requests.massDestroy') }}",
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
  let table = $('.datatable-approvedByJobRequests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection