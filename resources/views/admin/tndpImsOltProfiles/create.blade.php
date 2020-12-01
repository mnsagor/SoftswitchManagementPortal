@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.tndpImsOltProfile.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tndp-ims-olt-profiles.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('olt_name') ? 'has-error' : '' }}">
                            <label class="required" for="olt_name_id">{{ trans('cruds.tndpImsOltProfile.fields.olt_name') }}</label>
                            <select class="form-control select2" name="olt_name_id" id="olt_name_id" required>
                                @foreach($olt_names as $id => $olt_name)
                                    <option value="{{ $id }}" {{ old('olt_name_id') == $id ? 'selected' : '' }}>{{ $olt_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('olt_name'))
                                <span class="help-block" role="alert">{{ $errors->first('olt_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.olt_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.tndpImsOltProfile.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('job_type') ? 'has-error' : '' }}">
                            <label class="required" for="job_type_id">{{ trans('cruds.tndpImsOltProfile.fields.job_type') }}</label>
                            <select class="form-control select2" name="job_type_id" id="job_type_id" required>
                                @foreach($job_types as $id => $job_type)
                                    <option value="{{ $id }}" {{ old('job_type_id') == $id ? 'selected' : '' }}>{{ $job_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('job_type'))
                                <span class="help-block" role="alert">{{ $errors->first('job_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.job_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('device_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.tndpImsOltProfile.fields.device_type') }}</label>
                            <select class="form-control" name="device_type" id="device_type" required>
                                <option value disabled {{ old('device_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TndpImsOltProfile::DEVICE_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('device_type', 'mdu') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('device_type'))
                                <span class="help-block" role="alert">{{ $errors->first('device_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.device_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_ports') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsOltProfile.fields.no_of_ports') }}</label>
                            <select class="form-control" name="no_of_ports" id="no_of_ports">
                                <option value disabled {{ old('no_of_ports', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TndpImsOltProfile::NO_OF_PORTS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('no_of_ports', '24') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('no_of_ports'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_ports') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.no_of_ports_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('serial_number') ? 'has-error' : '' }}">
                            <label class="required" for="serial_number">{{ trans('cruds.tndpImsOltProfile.fields.serial_number') }}</label>
                            <input class="form-control" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', '') }}" required>
                            @if($errors->has('serial_number'))
                                <span class="help-block" role="alert">{{ $errors->first('serial_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.serial_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('interface') ? 'has-error' : '' }}">
                            <label class="required" for="interface">{{ trans('cruds.tndpImsOltProfile.fields.interface') }}</label>
                            <input class="form-control" type="text" name="interface" id="interface" value="{{ old('interface', '1/1/') }}" required>
                            @if($errors->has('interface'))
                                <span class="help-block" role="alert">{{ $errors->first('interface') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.interface_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
                            <label class="required" for="ip">{{ trans('cruds.tndpImsOltProfile.fields.ip') }}</label>
                            <input class="form-control" type="text" name="ip" id="ip" value="{{ old('ip', '') }}" required>
                            @if($errors->has('ip'))
                                <span class="help-block" role="alert">{{ $errors->first('ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number">{{ trans('cruds.tndpImsOltProfile.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('port_number') ? 'has-error' : '' }}">
                            <label class="required" for="port_number">{{ trans('cruds.tndpImsOltProfile.fields.port_number') }}</label>
                            <input class="form-control" type="text" name="port_number" id="port_number" value="{{ old('port_number', '') }}" required>
                            @if($errors->has('port_number'))
                                <span class="help-block" role="alert">{{ $errors->first('port_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.port_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.tndpImsOltProfile.fields.service') }}</label>
                            <select class="form-control" name="service" id="service" required>
                                <option value disabled {{ old('service', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TndpImsOltProfile::SERVICE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('service', 'both') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('service'))
                                <span class="help-block" role="alert">{{ $errors->first('service') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status_id">{{ trans('cruds.tndpImsOltProfile.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.tndpImsOltProfile.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsOltProfile.fields.description_helper') }}</span>
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
                xhr.open('POST', '/admin/tndp-ims-olt-profiles/ckmedia', true);
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
                data.append('crud_id', '{{ $tndpImsOltProfile->id ?? 0 }}');
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

@endsection