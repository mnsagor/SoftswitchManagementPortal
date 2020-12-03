@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.callSourceCode.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.call-source-codes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('zone') ? 'has-error' : '' }}">
                            <label class="required" for="zone_id">{{ trans('cruds.callSourceCode.fields.zone') }}</label>
                            <select class="form-control select2" name="zone_id" id="zone_id" required>
                                @foreach($zones as $id => $zone)
                                    <option value="{{ $id }}" {{ old('zone_id') == $id ? 'selected' : '' }}>{{ $zone }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zone'))
                                <span class="help-block" role="alert">{{ $errors->first('zone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.callSourceCode.fields.zone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.callSourceCode.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.callSourceCode.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label class="required" for="code">{{ trans('cruds.callSourceCode.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.callSourceCode.fields.code_helper') }}</span>
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