@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.osoAgw.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.oso-agws.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $osoAgw->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.ip') }}
                                    </th>
                                    <td>
                                        {{ $osoAgw->ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $osoAgw->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.office') }}
                                    </th>
                                    <td>
                                        {{ $osoAgw->office->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoAgw::IS_ACTIVE_RADIO[$osoAgw->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoAgw.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $osoAgw->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.oso-agws.index') }}">
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
                        <a href="#agw_ip_oso_numbers" aria-controls="agw_ip_oso_numbers" role="tab" data-toggle="tab">
                            {{ trans('cruds.osoNumber.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#oso_agw_ip_oso_number_profiles" aria-controls="oso_agw_ip_oso_number_profiles" role="tab" data-toggle="tab">
                            {{ trans('cruds.osoNumberProfile.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="agw_ip_oso_numbers">
                        @includeIf('admin.osoAgws.relationships.agwIpOsoNumbers', ['osoNumbers' => $osoAgw->agwIpOsoNumbers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="oso_agw_ip_oso_number_profiles">
                        @includeIf('admin.osoAgws.relationships.osoAgwIpOsoNumberProfiles', ['osoNumberProfiles' => $osoAgw->osoAgwIpOsoNumberProfiles])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection