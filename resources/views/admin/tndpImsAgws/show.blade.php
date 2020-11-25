@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tndpImsAgw.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-agws.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsAgw->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.ip') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsAgw->ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsAgw->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.office') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsAgw->office->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsAgw::IS_ACTIVE_RADIO[$tndpImsAgw->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsAgw.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $tndpImsAgw->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-agws.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection