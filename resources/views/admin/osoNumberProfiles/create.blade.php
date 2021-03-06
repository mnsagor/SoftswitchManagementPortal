@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.osoNumberProfile.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.oso-number-profiles.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('oso_agw_ip') ? 'has-error' : '' }}">
                            <label class="required" for="oso_agw_ip_id">{{ trans('cruds.osoNumberProfile.fields.oso_agw_ip') }}</label>
                            <select class="form-control select2" name="oso_agw_ip_id" id="oso_agw_ip_id" required>
                                @foreach($oso_agw_ips as $id => $oso_agw_ip)
                                    <option value="{{ $id }}" {{ old('oso_agw_ip_id') == $id ? 'selected' : '' }}>{{ $oso_agw_ip }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('oso_agw_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('oso_agw_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.oso_agw_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number_id">{{ trans('cruds.osoNumberProfile.fields.number') }}</label>
                            <select class="form-control select2" name="number_id" id="number_id" required>
                                @foreach($numbers as $id => $number)
                                    <option value="{{ $id }}" {{ old('number_id') == $id ? 'selected' : '' }}>{{ $number }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('oso_number') ? 'has-error' : '' }}">
                            <label for="oso_number">{{ trans('cruds.osoNumberProfile.fields.oso_number') }}</label>
                            <input class="form-control" type="text" name="oso_number" id="oso_number" value="{{ old('oso_number', '') }}">
                            @if($errors->has('oso_number'))
                                <span class="help-block" role="alert">{{ $errors->first('oso_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.oso_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_active') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '2') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_td') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_td') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_TD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_td_{{ $key }}" name="is_td" value="{{ $key }}" {{ old('is_td', '2') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_td_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_td'))
                                <span class="help-block" role="alert">{{ $errors->first('is_td') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_td_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_isd') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_isd') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_ISD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_isd_{{ $key }}" name="is_isd" value="{{ $key }}" {{ old('is_isd', '2') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_isd_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_isd'))
                                <span class="help-block" role="alert">{{ $errors->first('is_isd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_isd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_eisd') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_eisd') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_EISD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_eisd_{{ $key }}" name="is_eisd" value="{{ $key }}" {{ old('is_eisd', '2') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_eisd_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_eisd'))
                                <span class="help-block" role="alert">{{ $errors->first('is_eisd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_eisd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_pbx') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_pbx') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_PBX_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_pbx_{{ $key }}" name="is_pbx" value="{{ $key }}" {{ old('is_pbx', '3') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_pbx_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_pbx'))
                                <span class="help-block" role="alert">{{ $errors->first('is_pbx') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_pbx_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pbx_poilot_number') ? 'has-error' : '' }}">
                            <label for="pbx_poilot_number">{{ trans('cruds.osoNumberProfile.fields.pbx_poilot_number') }}</label>
                            <input class="form-control" type="text" name="pbx_poilot_number" id="pbx_poilot_number" value="{{ old('pbx_poilot_number', '') }}">
                            @if($errors->has('pbx_poilot_number'))
                                <span class="help-block" role="alert">{{ $errors->first('pbx_poilot_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.pbx_poilot_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_controller') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.request_controller') }}</label>
                            @foreach(App\Models\OsoNumberProfile::REQUEST_CONTROLLER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="request_controller_{{ $key }}" name="request_controller" value="{{ $key }}" {{ old('request_controller', '0') === (string) $key ? 'checked' : '' }}>
                                    <label for="request_controller_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('request_controller'))
                                <span class="help-block" role="alert">{{ $errors->first('request_controller') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.request_controller_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_queued') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.osoNumberProfile.fields.is_queued') }}</label>
                            @foreach(App\Models\OsoNumberProfile::IS_QUEUED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_queued_{{ $key }}" name="is_queued" value="{{ $key }}" {{ old('is_queued', '0') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_queued_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_queued'))
                                <span class="help-block" role="alert">{{ $errors->first('is_queued') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.osoNumberProfile.fields.is_queued_helper') }}</span>
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