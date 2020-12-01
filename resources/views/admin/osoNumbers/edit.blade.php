@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.osoNumber.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.oso-numbers.update", [$osoNumber->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.osoNumber.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', $osoNumber->number) }}" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.osoNumber.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tid">{{ trans('cruds.osoNumber.fields.tid') }}</label>
                <input class="form-control {{ $errors->has('tid') ? 'is-invalid' : '' }}" type="text" name="tid" id="tid" value="{{ old('tid', $osoNumber->tid) }}" required>
                @if($errors->has('tid'))
                    <span class="text-danger">{{ $errors->first('tid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.osoNumber.fields.tid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agw_ip_id">{{ trans('cruds.osoNumber.fields.agw_ip') }}</label>
                <select class="form-control select2 {{ $errors->has('agw_ip') ? 'is-invalid' : '' }}" name="agw_ip_id" id="agw_ip_id" required>
                    @foreach($agw_ips as $id => $agw_ip)
                        <option value="{{ $id }}" {{ (old('agw_ip_id') ? old('agw_ip_id') : $osoNumber->agw_ip->id ?? '') == $id ? 'selected' : '' }}>{{ $agw_ip }}</option>
                    @endforeach
                </select>
                @if($errors->has('agw_ip'))
                    <span class="text-danger">{{ $errors->first('agw_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.osoNumber.fields.agw_ip_helper') }}</span>
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