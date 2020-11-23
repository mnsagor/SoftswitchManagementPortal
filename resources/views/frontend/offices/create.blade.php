@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.office.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.offices.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="region_id">{{ trans('cruds.office.fields.region') }}</label>
                            <select class="form-control select2" name="region_id" id="region_id" required>
                                @foreach($regions as $id => $region)
                                    <option value="{{ $id }}" {{ old('region_id') == $id ? 'selected' : '' }}>{{ $region }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('region') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.region_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.office.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.office.fields.is_active') }}</label>
                            @foreach(App\Models\Office::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.office.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="area">{{ trans('cruds.office.fields.area') }}</label>
                            <input class="form-control" type="text" name="area" id="area" value="{{ old('area', '') }}">
                            @if($errors->has('area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.office.fields.area_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contact">{{ trans('cruds.office.fields.contact') }}</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                            @if($errors->has('contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact') }}
                                </div>
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