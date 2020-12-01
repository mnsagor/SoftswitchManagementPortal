@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.olt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.olts.update", [$olt->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.olt.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $olt->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.olt.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ip">{{ trans('cruds.olt.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $olt->ip) }}" required>
                @if($errors->has('ip'))
                    <span class="text-danger">{{ $errors->first('ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.olt.fields.ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vlan">{{ trans('cruds.olt.fields.vlan') }}</label>
                <input class="form-control {{ $errors->has('vlan') ? 'is-invalid' : '' }}" type="text" name="vlan" id="vlan" value="{{ old('vlan', $olt->vlan) }}" required>
                @if($errors->has('vlan'))
                    <span class="text-danger">{{ $errors->first('vlan') }}</span>
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



@endsection