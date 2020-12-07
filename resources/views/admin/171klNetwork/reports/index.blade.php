@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ '171Kl Network Phone Number' }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-JobRequest">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jobRequest.fields.id') }}
                        </th>

                        <th>
                            {{ 'Phone Number' }}
                        </th>
                        <th>
                            {{ trans('cruds.jobRequest.fields.agw_ip') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobRequest.fields.tid') }}
                        </th>

                        <th>
                            {{"Status"}}
                        </th>
                        <th>
                            {{ 'TD Status' }}
                        </th>
                        <th>
                            {{ trans('cruds.numberProfile.fields.isd_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.numberProfile.fields.eisd_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.numberProfile.fields.pbx_status') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $increment=1;
                    @endphp
                    @foreach($numberProfiles as $key => $jobRequest)
                        <tr data-entry-id="{{ $jobRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{$increment}}
                                @php
                                    $increment++;
                                @endphp
                            </td>
                            <td>
                                {{ $jobRequest->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $jobRequest->agw->ip ?? '' }}
                            </td>
                            <td>
                                {{ $jobRequest->tid ?? '' }}
                            </td>
                            <td>
{{--                                //status--}}
                                @if($jobRequest->numberProfiles->active_number_status == 0)
                                    <span class="badge badge-success">{{ "Free" }}</span>
                                @elseif($jobRequest->numberProfiles->active_number_status == 1)
                                    <span class="badge badge-danger">{{ "Active" }}</span>
                                @endif
                            </td>
                            <td>
{{--                                td status--}}
                                @if($jobRequest->numberProfiles->td_status == 0)
                                    <span class="badge badge-danger">{{ "" }}</span>
                                @elseif($jobRequest->numberProfiles->td_status == 1)
                                    <span class="badge badge-danger">{{ "TD" }}</span>
                                @endif
                            </td>
                            <td>
{{--                                isd status--}}
                                @if($jobRequest->numberProfiles->isd_status == 0)
                                    <span class="badge badge-danger">{{ "" }}</span>
                                @elseif($jobRequest->numberProfiles->isd_status == 1)
                                    <span class="badge badge-danger">{{ "ISD" }}</span>
                                @endif
                            </td>
                            <td>
{{--                                eisd status--}}
                                @if($jobRequest->numberProfiles->eisd_status == 0)
                                    <span class="badge badge-danger">{{ "" }}</span>
                                @elseif($jobRequest->numberProfiles->eisd_status == 1)
                                    <span class="badge badge-danger">{{ "EISD" }}</span>
                                @endif
                            </td>
                            <td>
{{--                                pbx status--}}
                                @if($jobRequest->numberProfiles->pbx_status == 0)
                                    <span class="badge badge-danger">{{ "" }}</span>
                                @elseif($jobRequest->numberProfiles->pbx_status == 1)
                                    <span class="badge badge-primary">{{ "Master" }}</span>
                                @elseif($jobRequest->numberProfiles->pbx_status == 2)
                                    <span class="badge badge-secondary">{{ "Slave" }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        function searchActivePhoneNumber(){

            var phone_number = document.getElementById('phone_number').value ;

            if(phone_number == false){
                alert("Phone Number should not be empty. Please fill Phone Number field.")
            }
            // var request_type = document.getElementById('request_type').value;

            $.ajax({
                url: '{{ route('admin.171klNetwork.active-subscribers.status') }}',
                type: 'POST',
                dataType: 'json',
                async: true,
                cache: false,
                data: {
                    phone_number: phone_number,
                    // request_type: request_type,
                    _token: '{{ csrf_token() }}'
                },

                success: function (data) {
                    console.log(data);

                    if (data.error) {
                        alert(data.msg);

                    } else {

                        console.log(data);
                        alert(data.msg);

                    }
                }
            });
        }



        // Initialize InputMask
        // $( document ).ready(function() {
        //     // $("#ip").inputmask();
        //     $("input").change(function(){
        //         document.getElementById('buttonSubmit').disabled = true;
        //     });
        //
        // });

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
            // dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'asc' ]],
                pageLength: 100,
            });
            $('.datatable-JobRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection

