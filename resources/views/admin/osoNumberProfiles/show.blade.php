@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.osoNumberProfile.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.oso-number-profiles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $osoNumberProfile->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.oso_agw_ip') }}
                                    </th>
                                    <td>
                                        {{ $osoNumberProfile->oso_agw_ip->ip ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $osoNumberProfile->number->number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoNumberProfile::IS_ACTIVE_RADIO[$osoNumberProfile->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.is_td') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoNumberProfile::IS_TD_RADIO[$osoNumberProfile->is_td] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.is_isd') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoNumberProfile::IS_ISD_RADIO[$osoNumberProfile->is_isd] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.is_eisd') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoNumberProfile::IS_EISD_RADIO[$osoNumberProfile->is_eisd] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.is_pbx') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OsoNumberProfile::IS_PBX_RADIO[$osoNumberProfile->is_pbx] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.osoNumberProfile.fields.pbx_poilot_number') }}
                                    </th>
                                    <td>
                                        {{ $osoNumberProfile->pbx_poilot_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.oso-number-profiles.index') }}">
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