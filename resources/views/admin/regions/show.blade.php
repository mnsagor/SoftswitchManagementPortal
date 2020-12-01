@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.region.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.regions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.region.fields.id') }}
                        </th>
                        <td>
                            {{ $region->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.region.fields.name') }}
                        </th>
                        <td>
                            {{ $region->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.region.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\Region::IS_ACTIVE_RADIO[$region->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.regions.index') }}">
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
            <a class="nav-link" href="#region_offices" role="tab" data-toggle="tab">
                {{ trans('cruds.office.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="region_offices">
            @includeIf('admin.regions.relationships.regionOffices', ['offices' => $region->regionOffices])
        </div>
    </div>
</div>

@endsection