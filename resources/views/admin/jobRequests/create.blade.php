@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jobRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="network_type_id">{{ trans('cruds.jobRequest.fields.network_type') }}</label>
                <select class="form-control select2 {{ $errors->has('network_type') ? 'is-invalid' : '' }}" name="network_type_id" id="network_type_id" required>
                    @foreach($network_types as $id => $network_type)
                        <option value="{{ $id }}" {{ old('network_type_id') == $id ? 'selected' : '' }}>{{ $network_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('network_type'))
                    <span class="text-danger">{{ $errors->first('network_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.network_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_type_id">{{ trans('cruds.jobRequest.fields.job_type') }}</label>
                <select class="form-control select2 {{ $errors->has('job_type') ? 'is-invalid' : '' }}" name="job_type_id" id="job_type_id" required>
                    @foreach($job_types as $id => $job_type)
                        <option value="{{ $id }}" {{ old('job_type_id') == $id ? 'selected' : '' }}>{{ $job_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_type'))
                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.job_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="request_type_id">{{ trans('cruds.jobRequest.fields.request_type') }}</label>
                <select class="form-control select2 {{ $errors->has('request_type') ? 'is-invalid' : '' }}" name="request_type_id" id="request_type_id" required>
                    @foreach($request_types as $id => $request_type)
                        <option value="{{ $id }}" {{ old('request_type_id') == $id ? 'selected' : '' }}>{{ $request_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('request_type'))
                    <span class="text-danger">{{ $errors->first('request_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.request_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="request_status_id">{{ trans('cruds.jobRequest.fields.request_status') }}</label>
                <select class="form-control select2 {{ $errors->has('request_status') ? 'is-invalid' : '' }}" name="request_status_id" id="request_status_id" required>
                    @foreach($request_statuses as $id => $request_status)
                        <option value="{{ $id }}" {{ old('request_status_id') == $id ? 'selected' : '' }}>{{ $request_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('request_status'))
                    <span class="text-danger">{{ $errors->first('request_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.request_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.jobRequest.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agw_ip">{{ trans('cruds.jobRequest.fields.agw_ip') }}</label>
                <input class="form-control {{ $errors->has('agw_ip') ? 'is-invalid' : '' }}" type="text" name="agw_ip" id="agw_ip" value="{{ old('agw_ip', '') }}" required>
                @if($errors->has('agw_ip'))
                    <span class="text-danger">{{ $errors->first('agw_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.agw_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tid">{{ trans('cruds.jobRequest.fields.tid') }}</label>
                <input class="form-control {{ $errors->has('tid') ? 'is-invalid' : '' }}" type="text" name="tid" id="tid" value="{{ old('tid', '') }}" required>
                @if($errors->has('tid'))
                    <span class="text-danger">{{ $errors->first('tid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.tid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.jobRequest.fields.note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{!! old('note') !!}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.jobRequest.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requested_by_id">{{ trans('cruds.jobRequest.fields.requested_by') }}</label>
                <select class="form-control select2 {{ $errors->has('requested_by') ? 'is-invalid' : '' }}" name="requested_by_id" id="requested_by_id" required>
                    @foreach($requested_bies as $id => $requested_by)
                        <option value="{{ $id }}" {{ old('requested_by_id') == $id ? 'selected' : '' }}>{{ $requested_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('requested_by'))
                    <span class="text-danger">{{ $errors->first('requested_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.requested_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_time">{{ trans('cruds.jobRequest.fields.request_time') }}</label>
                <input class="form-control datetime {{ $errors->has('request_time') ? 'is-invalid' : '' }}" type="text" name="request_time" id="request_time" value="{{ old('request_time') }}">
                @if($errors->has('request_time'))
                    <span class="text-danger">{{ $errors->first('request_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.request_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_by_id">{{ trans('cruds.jobRequest.fields.verified_by') }}</label>
                <select class="form-control select2 {{ $errors->has('verified_by') ? 'is-invalid' : '' }}" name="verified_by_id" id="verified_by_id">
                    @foreach($verified_bies as $id => $verified_by)
                        <option value="{{ $id }}" {{ old('verified_by_id') == $id ? 'selected' : '' }}>{{ $verified_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('verified_by'))
                    <span class="text-danger">{{ $errors->first('verified_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.verified_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verification_time">{{ trans('cruds.jobRequest.fields.verification_time') }}</label>
                <input class="form-control datetime {{ $errors->has('verification_time') ? 'is-invalid' : '' }}" type="text" name="verification_time" id="verification_time" value="{{ old('verification_time') }}">
                @if($errors->has('verification_time'))
                    <span class="text-danger">{{ $errors->first('verification_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.verification_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_by_id">{{ trans('cruds.jobRequest.fields.approved_by') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_by') ? 'is-invalid' : '' }}" name="approved_by_id" id="approved_by_id">
                    @foreach($approved_bies as $id => $approved_by)
                        <option value="{{ $id }}" {{ old('approved_by_id') == $id ? 'selected' : '' }}>{{ $approved_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_by'))
                    <span class="text-danger">{{ $errors->first('approved_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.approved_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approval_time">{{ trans('cruds.jobRequest.fields.approval_time') }}</label>
                <input class="form-control datetime {{ $errors->has('approval_time') ? 'is-invalid' : '' }}" type="text" name="approval_time" id="approval_time" value="{{ old('approval_time') }}">
                @if($errors->has('approval_time'))
                    <span class="text-danger">{{ $errors->first('approval_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.approval_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approval_note">{{ trans('cruds.jobRequest.fields.approval_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('approval_note') ? 'is-invalid' : '' }}" name="approval_note" id="approval_note">{!! old('approval_note') !!}</textarea>
                @if($errors->has('approval_note'))
                    <span class="text-danger">{{ $errors->first('approval_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.approval_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rejected_by_id">{{ trans('cruds.jobRequest.fields.rejected_by') }}</label>
                <select class="form-control select2 {{ $errors->has('rejected_by') ? 'is-invalid' : '' }}" name="rejected_by_id" id="rejected_by_id">
                    @foreach($rejected_bies as $id => $rejected_by)
                        <option value="{{ $id }}" {{ old('rejected_by_id') == $id ? 'selected' : '' }}>{{ $rejected_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('rejected_by'))
                    <span class="text-danger">{{ $errors->first('rejected_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.rejected_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rejection_time">{{ trans('cruds.jobRequest.fields.rejection_time') }}</label>
                <input class="form-control datetime {{ $errors->has('rejection_time') ? 'is-invalid' : '' }}" type="text" name="rejection_time" id="rejection_time" value="{{ old('rejection_time') }}">
                @if($errors->has('rejection_time'))
                    <span class="text-danger">{{ $errors->first('rejection_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.rejection_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rejection_note">{{ trans('cruds.jobRequest.fields.rejection_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('rejection_note') ? 'is-invalid' : '' }}" name="rejection_note" id="rejection_note">{!! old('rejection_note') !!}</textarea>
                @if($errors->has('rejection_note'))
                    <span class="text-danger">{{ $errors->first('rejection_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.rejection_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="script">{{ trans('cruds.jobRequest.fields.script') }}</label>
                <textarea class="form-control {{ $errors->has('script') ? 'is-invalid' : '' }}" name="script" id="script">{{ old('script') }}</textarea>
                @if($errors->has('script'))
                    <span class="text-danger">{{ $errors->first('script') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.script_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jobRequest.fields.is_force_request') }}</label>
                <select class="form-control {{ $errors->has('is_force_request') ? 'is-invalid' : '' }}" name="is_force_request" id="is_force_request">
                    <option value disabled {{ old('is_force_request', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\JobRequest::IS_FORCE_REQUEST_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_force_request', 'no') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_force_request'))
                    <span class="text-danger">{{ $errors->first('is_force_request') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobRequest.fields.is_force_request_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
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