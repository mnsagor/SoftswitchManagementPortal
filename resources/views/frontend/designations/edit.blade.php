@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.designation.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.designations.update", [$designation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.designation.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $designation->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.designation.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="grade">{{ trans('cruds.designation.fields.grade') }}</label>
                            <input class="form-control" type="text" name="grade" id="grade" value="{{ old('grade', $designation->grade) }}" required>
                            @if($errors->has('grade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.designation.fields.grade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.designation.fields.is_active') }}</label>
                            @foreach(App\Models\Designation::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $designation->is_active) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.designation.fields.is_active_helper') }}</span>
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