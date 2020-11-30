@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.olt.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.olts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.olt.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', 'OLT -') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.olt.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
                            <label class="required" for="ip">{{ trans('cruds.olt.fields.ip') }}</label>
                            <input class="form-control" type="text" name="ip" id="ip" value="{{ old('ip', '10.0.8.') }}" required>
                            @if($errors->has('ip'))
                                <span class="help-block" role="alert">{{ $errors->first('ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.olt.fields.ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vlan') ? 'has-error' : '' }}">
                            <label class="required" for="vlan">{{ trans('cruds.olt.fields.vlan') }}</label>
                            <input class="form-control" type="text" name="vlan" id="vlan" value="{{ old('vlan', '261') }}" required>
                            @if($errors->has('vlan'))
                                <span class="help-block" role="alert">{{ $errors->first('vlan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.olt.fields.vlan_helper') }}</span>
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