@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.office.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $office->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.region') }}
                                    </th>
                                    <td>
                                        {{ $office->region->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $office->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Office::IS_ACTIVE_RADIO[$office->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $office->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.area') }}
                                    </th>
                                    <td>
                                        {{ $office->area }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.contact') }}
                                    </th>
                                    <td>
                                        {{ $office->contact }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
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
                        <a href="#office_oso_agws" aria-controls="office_oso_agws" role="tab" data-toggle="tab">
                            {{ trans('cruds.osoAgw.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#office_tndp_ims_agws" aria-controls="office_tndp_ims_agws" role="tab" data-toggle="tab">
                            {{ trans('cruds.tndpImsAgw.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#office_users" aria-controls="office_users" role="tab" data-toggle="tab">
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="office_oso_agws">
                        @includeIf('admin.offices.relationships.officeOsoAgws', ['osoAgws' => $office->officeOsoAgws])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="office_tndp_ims_agws">
                        @includeIf('admin.offices.relationships.officeTndpImsAgws', ['tndpImsAgws' => $office->officeTndpImsAgws])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="office_users">
                        @includeIf('admin.offices.relationships.officeUsers', ['users' => $office->officeUsers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection