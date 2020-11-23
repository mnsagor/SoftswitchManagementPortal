@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.office.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.offices.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
                            <label class="required" for="region_id">{{ trans('cruds.office.fields.region') }}</label>
                            <select class="form-control select2" name="region_id" id="region_id" required>
                                @foreach($regions as $id => $region)
                                    <option value="{{ $id }}" {{ old('region_id') == $id ? 'selected' : '' }}>{{ $region }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region'))
                                <span class="help-block" role="alert">{{ $errors->first('region') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.region_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.office.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.office.fields.is_active') }}</label>
                            @foreach(App\Models\Office::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.office.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                            <label for="area">{{ trans('cruds.office.fields.area') }}</label>
                            <input class="form-control" type="text" name="area" id="area" value="{{ old('area', '') }}">
                            @if($errors->has('area'))
                                <span class="help-block" role="alert">{{ $errors->first('area') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.area_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                            <label for="contact">{{ trans('cruds.office.fields.contact') }}</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                            @if($errors->has('contact'))
                                <span class="help-block" role="alert">{{ $errors->first('contact') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.contact_helper') }}</span>
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