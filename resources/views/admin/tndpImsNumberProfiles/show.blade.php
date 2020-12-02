@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tndpImsNumberProfile.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-number-profiles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumberProfile->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.tndp_agw_ip') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumberProfile->tndp_agw_ip->ip ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumberProfile->number->number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.tndp_ims_number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumberProfile->tndp_ims_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsNumberProfile::IS_ACTIVE_RADIO[$tndpImsNumberProfile->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_td') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsNumberProfile::IS_TD_RADIO[$tndpImsNumberProfile->is_td] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_isd') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsNumberProfile::IS_ISD_RADIO[$tndpImsNumberProfile->is_isd] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_eisd') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsNumberProfile::IS_EISD_RADIO[$tndpImsNumberProfile->is_eisd] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.is_pbx') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TndpImsNumberProfile::IS_PBX_RADIO[$tndpImsNumberProfile->is_pbx] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumberProfile.fields.pbx_poilot_number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumberProfile->pbx_poilot_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-number-profiles.index') }}">
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