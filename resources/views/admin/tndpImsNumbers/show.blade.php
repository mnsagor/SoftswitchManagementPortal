@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tndpImsNumber.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-numbers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumber->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumber->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.tid') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumber->tid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tndpImsNumber.fields.agw_ip') }}
                                    </th>
                                    <td>
                                        {{ $tndpImsNumber->agw_ip->ip ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tndp-ims-numbers.index') }}">
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
                        <a href="#number_tndp_ims_number_profiles" aria-controls="number_tndp_ims_number_profiles" role="tab" data-toggle="tab">
                            {{ trans('cruds.tndpImsNumberProfile.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="number_tndp_ims_number_profiles">
                        @includeIf('admin.tndpImsNumbers.relationships.numberTndpImsNumberProfiles', ['tndpImsNumberProfiles' => $tndpImsNumber->numberTndpImsNumberProfiles])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection