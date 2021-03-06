@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label class="required" for="username">{{ trans('cruds.user.fields.username') }}</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required>
                            @if($errors->has('username'))
                                <span class="help-block" role="alert">{{ $errors->first('username') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payroll_emp') ? 'has-error' : '' }}">
                            <label class="required" for="payroll_emp_id">{{ trans('cruds.user.fields.payroll_emp') }}</label>
                            <select class="form-control select2" name="payroll_emp_id" id="payroll_emp_id" required>
                                @foreach($payroll_emps as $id => $payroll_emp)
                                    <option value="{{ $id }}" {{ (old('payroll_emp_id') ? old('payroll_emp_id') : $user->payroll_emp->id ?? '') == $id ? 'selected' : '' }}>{{ $payroll_emp }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payroll_emp'))
                                <span class="help-block" role="alert">{{ $errors->first('payroll_emp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.payroll_emp_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                            <label class="required" for="designation_id">{{ trans('cruds.user.fields.designation') }}</label>
                            <select class="form-control select2" name="designation_id" id="designation_id" required>
                                @foreach($designations as $id => $designation)
                                    <option value="{{ $id }}" {{ (old('designation_id') ? old('designation_id') : $user->designation->id ?? '') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('designation'))
                                <span class="help-block" role="alert">{{ $errors->first('designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="approved" value="0">
                                <input type="checkbox" name="approved" id="approved" value="1" {{ $user->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                                <label for="approved" style="font-weight: 400">{{ trans('cruds.user.fields.approved') }}</label>
                            </div>
                            @if($errors->has('approved'))
                                <span class="help-block" role="alert">{{ $errors->first('approved') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="help-block" role="alert">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('offices') ? 'has-error' : '' }}">
                            <label class="required" for="offices">{{ trans('cruds.user.fields.office') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="offices[]" id="offices" multiple required>
                                @foreach($offices as $id => $office)
                                    <option value="{{ $id }}" {{ (in_array($id, old('offices', [])) || $user->offices->contains($id)) ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('offices'))
                                <span class="help-block" role="alert">{{ $errors->first('offices') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.office_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('call_source_code') ? 'has-error' : '' }}">
                            <label for="call_source_code_id">{{ trans('cruds.user.fields.call_source_code') }}</label>
                            <select class="form-control select2" name="call_source_code_id" id="call_source_code_id">
                                @foreach($call_source_codes as $id => $call_source_code)
                                    <option value="{{ $id }}" {{ (old('call_source_code_id') ? old('call_source_code_id') : $user->call_source_code->id ?? '') == $id ? 'selected' : '' }}>{{ $call_source_code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('call_source_code'))
                                <span class="help-block" role="alert">{{ $errors->first('call_source_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.call_source_code_helper') }}</span>
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