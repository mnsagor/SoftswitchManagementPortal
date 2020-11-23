@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.designation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.designations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $designation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designation.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $designation->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designation.fields.grade') }}
                                    </th>
                                    <td>
                                        {{ $designation->grade }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designation.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Designation::IS_ACTIVE_RADIO[$designation->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.designations.index') }}">
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
                        <a href="#designation_emplpyees" aria-controls="designation_emplpyees" role="tab" data-toggle="tab">
                            {{ trans('cruds.emplpyee.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="designation_emplpyees">
                        @includeIf('admin.designations.relationships.designationEmplpyees', ['emplpyees' => $designation->designationEmplpyees])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection