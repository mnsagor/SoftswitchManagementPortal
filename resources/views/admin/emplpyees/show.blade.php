@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.emplpyee.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.emplpyees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->designation->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.office') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->office->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.sex') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Emplpyee::SEX_RADIO[$emplpyee->sex] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.payroll_emp') }}
                                    </th>
                                    <td>
                                        {{ $emplpyee->payroll_emp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.emplpyee.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Emplpyee::IS_ACTIVE_RADIO[$emplpyee->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.emplpyees.index') }}">
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
                        <a href="#employee_users" aria-controls="employee_users" role="tab" data-toggle="tab">
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="employee_users">
                        @includeIf('admin.emplpyees.relationships.employeeUsers', ['users' => $emplpyee->employeeUsers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection