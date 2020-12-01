<div class="m-3">
    @can('olt_job_request_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.olt-job-requests.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.oltJobRequest.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.oltJobRequest.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-networkTypeOltJobRequests">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.network_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.job_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.request_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.request_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.olt_ip') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.number') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.interface') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.service_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.port_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.device_ip') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.requested_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.request_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.verified_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.verification_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.approved_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.approval_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.rejected_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.rejection_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.oltJobRequest.fields.script') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($oltJobRequests as $key => $oltJobRequest)
                            <tr data-entry-id="{{ $oltJobRequest->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $oltJobRequest->id ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->network_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->job_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->request_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->request_status->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->olt_ip->ip ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->number ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->interface ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\OltJobRequest::SERVICE_TYPE_SELECT[$oltJobRequest->service_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->port_number ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->device_ip ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->requested_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->request_time ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->verified_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->verification_time ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->approved_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->approval_time ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->rejected_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->rejection_time ?? '' }}
                                </td>
                                <td>
                                    {{ $oltJobRequest->script ?? '' }}
                                </td>
                                <td>
                                    @can('olt_job_request_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.olt-job-requests.show', $oltJobRequest->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('olt_job_request_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.olt-job-requests.edit', $oltJobRequest->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('olt_job_request_delete')
                                        <form action="{{ route('admin.olt-job-requests.destroy', $oltJobRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('olt_job_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.olt-job-requests.massDestroy') }}",
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
  let table = $('.datatable-networkTypeOltJobRequests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection