@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.tndpImsNumberProfile.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tndp-ims-number-profiles.update", [$tndpImsNumberProfile->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number_id">{{ trans('cruds.tndpImsNumberProfile.fields.number') }}</label>
                            <select class="form-control select2" name="number_id" id="number_id" required>
                                @foreach($numbers as $id => $number)
                                    <option value="{{ $id }}" {{ (old('number_id') ? old('number_id') : $tndpImsNumberProfile->number->id ?? '') == $id ? 'selected' : '' }}>{{ $number }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_active') }}</label>
                            @foreach(App\Models\TndpImsNumberProfile::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $tndpImsNumberProfile->is_active) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_td') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_td') }}</label>
                            @foreach(App\Models\TndpImsNumberProfile::IS_TD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_td_{{ $key }}" name="is_td" value="{{ $key }}" {{ old('is_td', $tndpImsNumberProfile->is_td) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_td_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_td'))
                                <span class="help-block" role="alert">{{ $errors->first('is_td') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_td_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_isd') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_isd') }}</label>
                            @foreach(App\Models\TndpImsNumberProfile::IS_ISD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_isd_{{ $key }}" name="is_isd" value="{{ $key }}" {{ old('is_isd', $tndpImsNumberProfile->is_isd) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_isd_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_isd'))
                                <span class="help-block" role="alert">{{ $errors->first('is_isd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_isd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_eisd') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_eisd') }}</label>
                            @foreach(App\Models\TndpImsNumberProfile::IS_EISD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_eisd_{{ $key }}" name="is_eisd" value="{{ $key }}" {{ old('is_eisd', $tndpImsNumberProfile->is_eisd) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_eisd_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_eisd'))
                                <span class="help-block" role="alert">{{ $errors->first('is_eisd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_eisd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_pbx') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tndpImsNumberProfile.fields.is_pbx') }}</label>
                            @foreach(App\Models\TndpImsNumberProfile::IS_PBX_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_pbx_{{ $key }}" name="is_pbx" value="{{ $key }}" {{ old('is_pbx', $tndpImsNumberProfile->is_pbx) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_pbx_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_pbx'))
                                <span class="help-block" role="alert">{{ $errors->first('is_pbx') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumberProfile.fields.is_pbx_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pbx_poilot_number') ? 'has-error' : '' }}">
                            <label for="pbx_poilot_number">{{ trans('cruds.tndpImsNumberProfile.fields.pbx_poilot_number') }}</label>
                            <input class="form-control" type="text" name="pbx_poilot_number" id="pbx_poilot_number" value="{{ old('pbx_poilot_number', $tndpImsNumberProfile->pbx_poilot_number) }}">
                            @if($errors->has('pbx_poilot_number'))
                                <span class="help-block" role="alert">{{ $errors->first('pbx_poilot_number') }}</span>
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



        </div>
    </div>
</div>
@endsection