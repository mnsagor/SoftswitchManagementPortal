@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.oltJobRequest.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.olt-job-requests.update", [$oltJobRequest->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('network_type') ? 'has-error' : '' }}">
                            <label class="required" for="network_type_id">{{ trans('cruds.oltJobRequest.fields.network_type') }}</label>
                            <select class="form-control select2" name="network_type_id" id="network_type_id" required>
                                @foreach($network_types as $id => $network_type)
                                    <option value="{{ $id }}" {{ (old('network_type_id') ? old('network_type_id') : $oltJobRequest->network_type->id ?? '') == $id ? 'selected' : '' }}>{{ $network_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('network_type'))
                                <span class="help-block" role="alert">{{ $errors->first('network_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.network_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('job_type') ? 'has-error' : '' }}">
                            <label class="required" for="job_type_id">{{ trans('cruds.oltJobRequest.fields.job_type') }}</label>
                            <select class="form-control select2" name="job_type_id" id="job_type_id" required>
                                @foreach($job_types as $id => $job_type)
                                    <option value="{{ $id }}" {{ (old('job_type_id') ? old('job_type_id') : $oltJobRequest->job_type->id ?? '') == $id ? 'selected' : '' }}>{{ $job_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('job_type'))
                                <span class="help-block" role="alert">{{ $errors->first('job_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.job_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_type') ? 'has-error' : '' }}">
                            <label class="required" for="request_type_id">{{ trans('cruds.oltJobRequest.fields.request_type') }}</label>
                            <select class="form-control select2" name="request_type_id" id="request_type_id" required>
                                @foreach($request_types as $id => $request_type)
                                    <option value="{{ $id }}" {{ (old('request_type_id') ? old('request_type_id') : $oltJobRequest->request_type->id ?? '') == $id ? 'selected' : '' }}>{{ $request_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('request_type'))
                                <span class="help-block" role="alert">{{ $errors->first('request_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.request_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_status') ? 'has-error' : '' }}">
                            <label class="required" for="request_status_id">{{ trans('cruds.oltJobRequest.fields.request_status') }}</label>
                            <select class="form-control select2" name="request_status_id" id="request_status_id" required>
                                @foreach($request_statuses as $id => $request_status)
                                    <option value="{{ $id }}" {{ (old('request_status_id') ? old('request_status_id') : $oltJobRequest->request_status->id ?? '') == $id ? 'selected' : '' }}>{{ $request_status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('request_status'))
                                <span class="help-block" role="alert">{{ $errors->first('request_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.request_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('olt_ip') ? 'has-error' : '' }}">
                            <label class="required" for="olt_ip_id">{{ trans('cruds.oltJobRequest.fields.olt_ip') }}</label>
                            <select class="form-control select2" name="olt_ip_id" id="olt_ip_id" required>
                                @foreach($olt_ips as $id => $olt_ip)
                                    <option value="{{ $id }}" {{ (old('olt_ip_id') ? old('olt_ip_id') : $oltJobRequest->olt_ip->id ?? '') == $id ? 'selected' : '' }}>{{ $olt_ip }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('olt_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('olt_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.olt_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number">{{ trans('cruds.oltJobRequest.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', $oltJobRequest->number) }}" required>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('interface') ? 'has-error' : '' }}">
                            <label class="required" for="interface">{{ trans('cruds.oltJobRequest.fields.interface') }}</label>
                            <input class="form-control" type="text" name="interface" id="interface" value="{{ old('interface', $oltJobRequest->interface) }}" required>
                            @if($errors->has('interface'))
                                <span class="help-block" role="alert">{{ $errors->first('interface') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.interface_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.oltJobRequest.fields.service_type') }}</label>
                            <select class="form-control" name="service_type" id="service_type" required>
                                <option value disabled {{ old('service_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\OltJobRequest::SERVICE_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('service_type', $oltJobRequest->service_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('service_type'))
                                <span class="help-block" role="alert">{{ $errors->first('service_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.service_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('port_number') ? 'has-error' : '' }}">
                            <label class="required" for="port_number">{{ trans('cruds.oltJobRequest.fields.port_number') }}</label>
                            <input class="form-control" type="text" name="port_number" id="port_number" value="{{ old('port_number', $oltJobRequest->port_number) }}" required>
                            @if($errors->has('port_number'))
                                <span class="help-block" role="alert">{{ $errors->first('port_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.port_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('device_ip') ? 'has-error' : '' }}">
                            <label for="device_ip">{{ trans('cruds.oltJobRequest.fields.device_ip') }}</label>
                            <input class="form-control" type="text" name="device_ip" id="device_ip" value="{{ old('device_ip', $oltJobRequest->device_ip) }}">
                            @if($errors->has('device_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('device_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.device_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.oltJobRequest.fields.note') }}</label>
                            <textarea class="form-control ckeditor" name="note" id="note">{!! old('note', $oltJobRequest->note) !!}</textarea>
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file">{{ trans('cruds.oltJobRequest.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('requested_by') ? 'has-error' : '' }}">
                            <label class="required" for="requested_by_id">{{ trans('cruds.oltJobRequest.fields.requested_by') }}</label>
                            <select class="form-control select2" name="requested_by_id" id="requested_by_id" required>
                                @foreach($requested_bies as $id => $requested_by)
                                    <option value="{{ $id }}" {{ (old('requested_by_id') ? old('requested_by_id') : $oltJobRequest->requested_by->id ?? '') == $id ? 'selected' : '' }}>{{ $requested_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('requested_by'))
                                <span class="help-block" role="alert">{{ $errors->first('requested_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.requested_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_time') ? 'has-error' : '' }}">
                            <label for="request_time">{{ trans('cruds.oltJobRequest.fields.request_time') }}</label>
                            <input class="form-control datetime" type="text" name="request_time" id="request_time" value="{{ old('request_time', $oltJobRequest->request_time) }}">
                            @if($errors->has('request_time'))
                                <span class="help-block" role="alert">{{ $errors->first('request_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.request_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('verified_by') ? 'has-error' : '' }}">
                            <label for="verified_by_id">{{ trans('cruds.oltJobRequest.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $verified_by)
                                    <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $oltJobRequest->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $verified_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <span class="help-block" role="alert">{{ $errors->first('verified_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('verification_time') ? 'has-error' : '' }}">
                            <label for="verification_time">{{ trans('cruds.oltJobRequest.fields.verification_time') }}</label>
                            <input class="form-control datetime" type="text" name="verification_time" id="verification_time" value="{{ old('verification_time', $oltJobRequest->verification_time) }}">
                            @if($errors->has('verification_time'))
                                <span class="help-block" role="alert">{{ $errors->first('verification_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.verification_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approved_by') ? 'has-error' : '' }}">
                            <label for="approved_by_id">{{ trans('cruds.oltJobRequest.fields.approved_by') }}</label>
                            <select class="form-control select2" name="approved_by_id" id="approved_by_id">
                                @foreach($approved_bies as $id => $approved_by)
                                    <option value="{{ $id }}" {{ (old('approved_by_id') ? old('approved_by_id') : $oltJobRequest->approved_by->id ?? '') == $id ? 'selected' : '' }}>{{ $approved_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('approved_by'))
                                <span class="help-block" role="alert">{{ $errors->first('approved_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.approved_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approval_time') ? 'has-error' : '' }}">
                            <label for="approval_time">{{ trans('cruds.oltJobRequest.fields.approval_time') }}</label>
                            <input class="form-control datetime" type="text" name="approval_time" id="approval_time" value="{{ old('approval_time', $oltJobRequest->approval_time) }}">
                            @if($errors->has('approval_time'))
                                <span class="help-block" role="alert">{{ $errors->first('approval_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.approval_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approval_note') ? 'has-error' : '' }}">
                            <label for="approval_note">{{ trans('cruds.oltJobRequest.fields.approval_note') }}</label>
                            <textarea class="form-control ckeditor" name="approval_note" id="approval_note">{!! old('approval_note', $oltJobRequest->approval_note) !!}</textarea>
                            @if($errors->has('approval_note'))
                                <span class="help-block" role="alert">{{ $errors->first('approval_note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.approval_note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rejected_by') ? 'has-error' : '' }}">
                            <label for="rejected_by_id">{{ trans('cruds.oltJobRequest.fields.rejected_by') }}</label>
                            <select class="form-control select2" name="rejected_by_id" id="rejected_by_id">
                                @foreach($rejected_bies as $id => $rejected_by)
                                    <option value="{{ $id }}" {{ (old('rejected_by_id') ? old('rejected_by_id') : $oltJobRequest->rejected_by->id ?? '') == $id ? 'selected' : '' }}>{{ $rejected_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rejected_by'))
                                <span class="help-block" role="alert">{{ $errors->first('rejected_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.rejected_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rejection_time') ? 'has-error' : '' }}">
                            <label for="rejection_time">{{ trans('cruds.oltJobRequest.fields.rejection_time') }}</label>
                            <input class="form-control datetime" type="text" name="rejection_time" id="rejection_time" value="{{ old('rejection_time', $oltJobRequest->rejection_time) }}">
                            @if($errors->has('rejection_time'))
                                <span class="help-block" role="alert">{{ $errors->first('rejection_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.rejection_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rejection_note') ? 'has-error' : '' }}">
                            <label for="rejection_note">{{ trans('cruds.oltJobRequest.fields.rejection_note') }}</label>
                            <textarea class="form-control ckeditor" name="rejection_note" id="rejection_note">{!! old('rejection_note', $oltJobRequest->rejection_note) !!}</textarea>
                            @if($errors->has('rejection_note'))
                                <span class="help-block" role="alert">{{ $errors->first('rejection_note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.rejection_note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('script') ? 'has-error' : '' }}">
                            <label for="script">{{ trans('cruds.oltJobRequest.fields.script') }}</label>
                            <textarea class="form-control" name="script" id="script">{{ old('script', $oltJobRequest->script) }}</textarea>
                            @if($errors->has('script'))
                                <span class="help-block" role="alert">{{ $errors->first('script') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oltJobRequest.fields.script_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/olt-job-requests/ckmedia', true);
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
                data.append('crud_id', '{{ $oltJobRequest->id ?? 0 }}');
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
});
</script>

<script>
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.olt-job-requests.storeMedia') }}',
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
@if(isset($oltJobRequest) && $oltJobRequest->file)
          var files =
            {!! json_encode($oltJobRequest->file) !!}
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