@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.tndpImsNumber.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tndp-ims-numbers.update", [$tndpImsNumber->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number">{{ trans('cruds.tndpImsNumber.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', $tndpImsNumber->number) }}" required>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumber.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tid') ? 'has-error' : '' }}">
                            <label class="required" for="tid">{{ trans('cruds.tndpImsNumber.fields.tid') }}</label>
                            <input class="form-control" type="text" name="tid" id="tid" value="{{ old('tid', $tndpImsNumber->tid) }}" required>
                            @if($errors->has('tid'))
                                <span class="help-block" role="alert">{{ $errors->first('tid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tndpImsNumber.fields.tid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('agw_ip') ? 'has-error' : '' }}">
                            <label class="required" for="agw_ip">{{ trans('cruds.tndpImsNumber.fields.agw_ip') }}</label>
                            <input class="form-control" type="text" name="agw_ip" id="agw_ip" value="{{ old('agw_ip', $tndpImsNumber->agw_ip) }}" required>
                            @if($errors->has('agw_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('agw_ip') }}</span>
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



        </div>
    </div>
</div>
@endsection