@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.osoAgw.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.oso-agws.update", [$osoAgw->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
                            <label class="required" for="ip">{{ trans('cruds.osoAgw.fields.ip') }}</label>
                            <input class="form-control" type="text" name="ip" id="ip" value="{{ old('ip', $osoAgw->ip) }}" required>
                            @if($errors->has('ip'))
                                <span class="help-block" role="alert">{{ $errors->first('ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoAgw.fields.ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.osoAgw.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $osoAgw->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoAgw.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('office') ? 'has-error' : '' }}">
                            <label for="office_id">{{ trans('cruds.osoAgw.fields.office') }}</label>
                            <select class="form-control select2" name="office_id" id="office_id">
                                @foreach($offices as $id => $office)
                                    <option value="{{ $id }}" {{ (old('office_id') ? old('office_id') : $osoAgw->office->id ?? '') == $id ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office'))
                                <span class="help-block" role="alert">{{ $errors->first('office') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoAgw.fields.office_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.osoAgw.fields.is_active') }}</label>
                            @foreach(App\Models\OsoAgw::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $osoAgw->is_active) === (string) $key ? 'checked' : '' }} required>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoAgw.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.osoAgw.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $osoAgw->description) !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoAgw.fields.description_helper') }}</span>
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
                xhr.open('POST', '/admin/oso-agws/ckmedia', true);
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
                data.append('crud_id', '{{ $osoAgw->id ?? 0 }}');
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