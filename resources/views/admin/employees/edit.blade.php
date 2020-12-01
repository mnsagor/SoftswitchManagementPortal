@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employees.update", [$employee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.employee.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation_id">{{ trans('cruds.employee.fields.designation') }}</label>
                <select class="form-control select2 {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation_id" id="designation_id" required>
                    @foreach($designations as $id => $designation)
                        <option value="{{ $id }}" {{ (old('designation_id') ? old('designation_id') : $employee->designation->id ?? '') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.employee.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $employee->mobile) }}" required>
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.employee.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $employee->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.employee.fields.sex') }}</label>
                @foreach(App\Models\Employee::SEX_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sex') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sex_{{ $key }}" name="sex" value="{{ $key }}" {{ old('sex', $employee->sex) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sex_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sex'))
                    <span class="text-danger">{{ $errors->first('sex') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.sex_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payroll_emp">{{ trans('cruds.employee.fields.payroll_emp') }}</label>
                <input class="form-control {{ $errors->has('payroll_emp') ? 'is-invalid' : '' }}" type="text" name="payroll_emp" id="payroll_emp" value="{{ old('payroll_emp', $employee->payroll_emp) }}">
                @if($errors->has('payroll_emp'))
                    <span class="text-danger">{{ $errors->first('payroll_emp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.payroll_emp_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employee.fields.is_active') }}</label>
                @foreach(App\Models\Employee::IS_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $employee->is_active) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.is_active_helper') }}</span>
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