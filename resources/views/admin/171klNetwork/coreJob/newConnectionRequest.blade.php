@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ "New Connection Request" }}
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

                    <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-new-connection.request") }}" enctype="multipart/form-data">
                        @csrf

{{--                        <input type="hidden" id="network_type_id" name="network_type_id" value= {{$network_types->id}} >--}}
                        <input type="hidden" id="requested_by_id" name="requested_by_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        <input type="hidden" id="request_type_id" name="request_type_id" value="{{ config('global.NEW_CONNECTION_REQUEST') }}">
                        {{--                        <input type="hidden" id="request_type" name="request_type" value="{{ config('global.NEW_CONNECTION_REQUEST') }}">--}}
                        {{--                        <input type="hidden" id="network_type" name="network_type" value="{{ config('global.171KL_NETWORK') }}">--}}
                        {{--                        <input type="hidden" id="network_sub_type" name="network_sub_type" value="{{ config('global.CORE_JOB') }}">--}}


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

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="agw_ip">{{ "AGW IP Address" }}</label>
                                    <input class="form-control {{ $errors->has('agw_ip') ? 'is-invalid' : '' }}" type="ip" name="agw_ip" id="agw_ip" value="{{ old('agw_ip', '') }}"
                                           required  placeholder="10.X.X.X" readonly>
                                    @if($errors->has('agw_ip'))
                                        <span class="text-danger">{{ $errors->first('agw_ip') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="tid">{{ "TID" }}</label>
                                    <input class="form-control {{ $errors->has('tid') ? 'is-invalid' : '' }}" type="text" name="tid" id="tid" value="{{ old('tid', '') }}"
                                           required autofocus placeholder="XXXX" readonly>
                                    @if($errors->has('tid'))
                                        <span class="text-danger">{{ $errors->first('tid') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if (\Illuminate\Support\Facades\Auth::user()->isAdmin())
                        <div class="form-group {{ $errors->has('call_source_code') ? 'has-error' : '' }}">
                            <label class="required" for="call_source_code_id">{{ trans('cruds.jobRequest.fields.call_source_code') }}</label>
                            <select class="form-control select2" name="call_source_code_id" id="call_source_code_id" required>
                                @foreach($call_source_codes as $id => $call_source_code)
                                    <option value="{{ $id }}" {{ old('call_source_code_id') == $id ? 'selected' : '' }}>{{ $call_source_code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('call_source_code'))
                                <span class="help-block" role="alert">{{ $errors->first('call_source_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jobRequest.fields.call_source_code_helper') }}</span>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="note">{{ "Reference Note" }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" placeholder="{{"Reference Note (Optional)"}}" name="note" id="note">{!! old('note') !!}</textarea>
                            @if($errors->has('note'))
                                <span class="text-danger">{{ $errors->first('note') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <button id="buttonSubmit" class="btn btn-danger" type="submit" disabled>
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script>
        function validatePhoneNumber(){

           var number= document.getElementById('number').value ;
           // var request_type = document.getElementById('request_type').value;
           var request_type_id = "<?php echo config('global.NEW_CONNECTION_REQUEST'); ?>";
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

                        // $('#error_show_div').css('display', 'block').html('test for error');
                        document.getElementById('buttonSubmit').disabled = true;
                        document.getElementById('agw_ip').value=null;
                        document.getElementById('tid').value=null;
                        alert(data.msg);

                    } else {

                        console.log(data);
                        // alert(data.number);
                        var agwIp = document.getElementById('agw_ip').value=data.agw_ip;
                        var tid = document.getElementById('tid').value=data.tid;
                        document.getElementById('buttonSubmit').disabled = false;

                    }
                }
            });
        }

        // Initialize InputMask
        $( document ).ready(function() {
            // $("#ip").inputmask();
            $("input").change(function(){
                document.getElementById('buttonSubmit').disabled = true;
            });

        });

    </script>
@endsection

