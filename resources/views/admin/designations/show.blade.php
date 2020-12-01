@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.designation.title') }}
    </div>

    <div class="card-body">
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#designation_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#designation_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="designation_users">
            @includeIf('admin.designations.relationships.designationUsers', ['users' => $designation->designationUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="designation_employees">
            @includeIf('admin.designations.relationships.designationEmployees', ['employees' => $designation->designationEmployees])
        </div>
    </div>
</div>

@endsection