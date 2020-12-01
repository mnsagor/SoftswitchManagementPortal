@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tndpImsNumber.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tndp-ims-numbers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.tndpImsNumber.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumber.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tid">{{ trans('cruds.tndpImsNumber.fields.tid') }}</label>
                <input class="form-control {{ $errors->has('tid') ? 'is-invalid' : '' }}" type="text" name="tid" id="tid" value="{{ old('tid', '') }}" required>
                @if($errors->has('tid'))
                    <span class="text-danger">{{ $errors->first('tid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumber.fields.tid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agw_ip">{{ trans('cruds.tndpImsNumber.fields.agw_ip') }}</label>
                <input class="form-control {{ $errors->has('agw_ip') ? 'is-invalid' : '' }}" type="text" name="agw_ip" id="agw_ip" value="{{ old('agw_ip', '') }}" required>
                @if($errors->has('agw_ip'))
                    <span class="text-danger">{{ $errors->first('agw_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumber.fields.agw_ip_helper') }}</span>
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