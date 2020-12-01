@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.osoAgw.title') }}
    </div>

    <div class="card-body">
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#agw_ip_oso_numbers" role="tab" data-toggle="tab">
                {{ trans('cruds.osoNumber.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#oso_agw_ip_oso_number_profiles" role="tab" data-toggle="tab">
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

@endsection