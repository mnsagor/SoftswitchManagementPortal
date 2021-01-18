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
                            @include('admin.171klNetwork.csvImport.newConnectionModal', ['model' => 'JobRequest', 'route' => 'admin.job-requests.parseCsvImport.171kl-coreJob'])
                        </div>
                    </div>

                    <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-new-connection.request") }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="requested_by_id" name="requested_by_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        <input type="hidden" id="request_type_id" name="request_type_id" value="{{ config('global.NEW_CONNECTION_REQUEST') }}">


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

{{--                        Upload document file--}}
                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file">{{ trans('cruds.jobRequest.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jobRequest.fields.file_helper') }}</span>
                        </div>

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

            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/job-requests/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $jobRequest->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }

            // $("#ip").inputmask();
            $("input").change(function(){
                document.getElementById('buttonSubmit').disabled = true;
            });


        });

    </script>
    <script>
        var uploadedFileMap = {}
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.job-requests.storeMedia') }}',
            maxFilesize: 20, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 20
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
                uploadedFileMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFileMap[file.name]
                }
                $('form').find('input[name="file[]"][value="' + name + '"]').remove()
            },
            init: function () {
                    @if(isset($jobRequest) && $jobRequest->file)
                var files =
                {!! json_encode($jobRequest->file) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection

