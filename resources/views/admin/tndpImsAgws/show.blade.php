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

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#agw_ip_tndp_ims_numbers" aria-controls="agw_ip_tndp_ims_numbers" role="tab" data-toggle="tab">
                            {{ trans('cruds.tndpImsNumber.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tndp_agw_ip_tndp_ims_number_profiles" aria-controls="tndp_agw_ip_tndp_ims_number_profiles" role="tab" data-toggle="tab">
                            {{ trans('cruds.tndpImsNumberProfile.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="agw_ip_tndp_ims_numbers">
                        @includeIf('admin.tndpImsAgws.relationships.agwIpTndpImsNumbers', ['tndpImsNumbers' => $tndpImsAgw->agwIpTndpImsNumbers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tndp_agw_ip_tndp_ims_number_profiles">
                        @includeIf('admin.tndpImsAgws.relationships.tndpAgwIpTndpImsNumberProfiles', ['tndpImsNumberProfiles' => $tndpImsAgw->tndpAgwIpTndpImsNumberProfiles])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection