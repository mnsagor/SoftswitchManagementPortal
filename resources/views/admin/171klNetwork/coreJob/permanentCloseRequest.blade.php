@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{"Permanently Closing Request"}}
                    </div>
                    <div class="panel-body">
                        <div style="margin-bottom: 10px; margin-top: 10px" class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-info" data-toggle="modal" data-target="#csvImportModal">
                                    {{ "Batch Import" }}
                                </button>
                                {{--            @include('csvImport.modal', ['model' => 'NumberProfile', 'route' => 'admin.number-profiles.parseCsvImport'])--}}
                            </div>
                        </div>
                        <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-permanent-close.request") }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="requested_by_id" name="requested_by_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            <input type="hidden" id="request_type_id" name="request_type_id" value="{{ config('global.PERMANENT_CLOSE_REQUEST') }}">

                            <div class="row">
                                {{--                    Phone Number input--}}
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="required" for="number">{{ "Phone Number" }}</label>
                                        <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}" required placeholder="5XXXXXXX">
                                        @if($errors->has('number'))
                                            <span class="text-danger">{{ $errors->first('number') }}</span>
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

                            {{--                            <input type="hidden" id="requested_by" name="requested_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">--}}
                            {{--                            <input type="hidden" id="request_type" name="request_type" value="{{ config('global.TEMPORARY_DISCONNECTION_REQUEST') }}">--}}
                            {{--                            <input type="hidden" id="network_type" name="network_type" value="{{ config('global.171KL_NETWORK') }}">--}}
                            {{--                            <input type="hidden" id="network_sub_type" name="network_sub_type" value="{{ config('global.CORE_JOB') }}">--}}
                            <div class="form-group">
                                <button id="buttonSubmit" class="btn btn-danger" type="submit" disabled>
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </form>


                    </div>

                </div>

                {{--            @include('csvImport.modal', ['model' => 'NumberProfile', 'route' => 'admin.number-profiles.parseCsvImport'])--}}


            </div>
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

            var number= document.getElementById('number').value ;
            // var request_type = document.getElementById('request_type').value;
            var request_type_id = "<?php echo config('global.PERMANENT_CLOSE_REQUEST'); ?>";
            console.log(request_type_id);


            $.ajax({
                url: '{{ route('admin.validate-171kl-phone-number') }}',
                type: 'POST',
                dataType: 'json',
                async: true,
                cache: false,
                data: {
                    number: number,
                    request_type_id: request_type_id,
                    _token: '{{ csrf_token() }}'
                },

                success: function (data) {
                    console.log(data);

                    if (data.error) {
                        document.getElementById('buttonSubmit').disabled = true;
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

