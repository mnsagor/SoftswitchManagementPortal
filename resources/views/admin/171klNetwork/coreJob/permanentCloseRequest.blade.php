@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-info" data-toggle="modal" data-target="#csvImportModal">
                {{ "Batch Import" }}
            </button>
            @include('csvImport.modal', ['model' => 'NumberProfile', 'route' => 'admin.number-profiles.parseCsvImport'])
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ "Permanent Close Request" }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-permanent-close.request") }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{--                    Phone Number input--}}
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="required" for="phone_number">{{ "Phone Number" }}</label>
                            <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required placeholder="5XXXXXXX">
                            @if($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{ "." }}</label> <br>
                            <a href="#" onclick="validatePhoneNumber()" id="validatePhoneNumber">
                                <div class="btn btn-success" >
                                    {{ 'Validate Phone Number' }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>{{ "Upload Document" }}</label> <br>
                        <input id="csv_file" type="file" class="form-control-file" name="csv_file" required disabled="ture">

                        @if($errors->has('csv_file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('csv_file') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <input type="hidden" id="requested_by" name="requested_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" id="request_type" name="request_type" value="{{ config('global.PERMANENT_CLOSE_REQUEST') }}">
                <input type="hidden" id="network_type" name="network_type" value="{{ config('global.171KL_NETWORK') }}">
                <input type="hidden" id="network_sub_type" name="network_sub_type" value="{{ config('global.CORE_JOB') }}">

                <div class="form-group">
                    <button id="buttonSubmit" class="btn btn-danger" type="submit" disabled>
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        // Initialize InputMask
        $( document ).ready(function() {
            // $("#ip").inputmask();
            $("input").change(function(){
                document.getElementById('buttonSubmit').disabled = true;
            });
        });

        function validatePhoneNumber(){

            var phone_number= document.getElementById('phone_number').value ;
            var request_type = document.getElementById('request_type').value;

            $.ajax({
                url: '{{ route('admin.validate-phone-number') }}',
                type: 'POST',
                dataType: 'json',
                async: true,
                cache: false,
                data: {
                    phone_number: phone_number,
                    request_type: request_type,
                    _token: '{{ csrf_token() }}'
                },

                success: function (data) {
                    console.log(data);

                    if (data.error) {

                        // $('#error_show_div').css('display', 'block').html('test for error');
                        document.getElementById('buttonSubmit').disabled = true;
                        // document.getElementById('agw_ip').value=null;
                        // document.getElementById('tid').value=null;
                        alert(data.msg);

                    } else {

                        console.log(data);
                        // alert(data.phone_number);
                        document.getElementById('buttonSubmit').disabled = false;

                    }
                }
            });
        }

    </script>
@endsection

