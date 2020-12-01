@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tndpImsNumberProfile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tndp-ims-number-profiles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="number_id">{{ trans('cruds.tndpImsNumberProfile.fields.number') }}</label>
                <select class="form-control select2 {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number_id" id="number_id" required>
                    @foreach($numbers as $id => $number)
                        <option value="{{ $id }}" {{ old('number_id') == $id ? 'selected' : '' }}>{{ $number }}</option>
                    @endforeach
                </select>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_active') }}</label>
                @foreach(App\Models\TndpImsNumberProfile::IS_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_td') }}</label>
                @foreach(App\Models\TndpImsNumberProfile::IS_TD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_td') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_td_{{ $key }}" name="is_td" value="{{ $key }}" {{ old('is_td', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_td_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_td'))
                    <span class="text-danger">{{ $errors->first('is_td') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_td_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_isd') }}</label>
                @foreach(App\Models\TndpImsNumberProfile::IS_ISD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_isd') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_isd_{{ $key }}" name="is_isd" value="{{ $key }}" {{ old('is_isd', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_isd_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_isd'))
                    <span class="text-danger">{{ $errors->first('is_isd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_isd_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_eisd') }}</label>
                @foreach(App\Models\TndpImsNumberProfile::IS_EISD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_eisd') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_eisd_{{ $key }}" name="is_eisd" value="{{ $key }}" {{ old('is_eisd', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_eisd_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_eisd'))
                    <span class="text-danger">{{ $errors->first('is_eisd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_eisd_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_pbx') }}</label>
                @foreach(App\Models\TndpImsNumberProfile::IS_PBX_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_pbx') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_pbx_{{ $key }}" name="is_pbx" value="{{ $key }}" {{ old('is_pbx', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_pbx_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_pbx'))
                    <span class="text-danger">{{ $errors->first('is_pbx') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_pbx_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pbx_poilot_number">{{ trans('cruds.tndpImsNumberProfile.fields.pbx_poilot_number') }}</label>
                <input class="form-control {{ $errors->has('pbx_poilot_number') ? 'is-invalid' : '' }}" type="text" name="pbx_poilot_number" id="pbx_poilot_number" value="{{ old('pbx_poilot_number', '') }}">
                @if($errors->has('pbx_poilot_number'))
                    <span class="text-danger">{{ $errors->first('pbx_poilot_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.pbx_poilot_number_helper') }}</span>
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