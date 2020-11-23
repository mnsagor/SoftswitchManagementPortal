@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.emplpyee.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.emplpyees.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.emplpyee.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="designation_id">{{ trans('cruds.emplpyee.fields.designation') }}</label>
                            <select class="form-control select2" name="designation_id" id="designation_id" required>
                                @foreach($designations as $id => $designation)
                                    <option value="{{ $id }}" {{ old('designation_id') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('designation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="office_id">{{ trans('cruds.emplpyee.fields.office') }}</label>
                            <select class="form-control select2" name="office_id" id="office_id" required>
                                @foreach($offices as $id => $office)
                                    <option value="{{ $id }}" {{ old('office_id') == $id ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.office_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mobile">{{ trans('cruds.emplpyee.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', '+880') }}" required>
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.emplpyee.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.emplpyee.fields.sex') }}</label>
                            @foreach(App\Models\Emplpyee::SEX_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="sex_{{ $key }}" name="sex" value="{{ $key }}" {{ old('sex', '1') === (string) $key ? 'checked' : '' }} required>
                                    <label for="sex_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('sex'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sex') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.sex_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payroll_emp">{{ trans('cruds.emplpyee.fields.payroll_emp') }}</label>
                            <input class="form-control" type="text" name="payroll_emp" id="payroll_emp" value="{{ old('payroll_emp', '') }}">
                            @if($errors->has('payroll_emp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payroll_emp') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.payroll_emp_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.emplpyee.fields.is_active') }}</label>
                            @foreach(App\Models\Emplpyee::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.emplpyee.fields.is_active_helper') }}</span>
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