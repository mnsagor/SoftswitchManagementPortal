@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.osoNumber.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.oso-numbers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.osoNumber.fields.id') }}
                        </th>
                        <td>
                            {{ $osoNumber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.osoNumber.fields.number') }}
                        </th>
                        <td>
                            {{ $osoNumber->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.osoNumber.fields.tid') }}
                        </th>
                        <td>
                            {{ $osoNumber->tid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.osoNumber.fields.agw_ip') }}
                        </th>
                        <td>
                            {{ $osoNumber->agw_ip->ip ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.oso-numbers.index') }}">
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
            <a class="nav-link" href="#number_oso_number_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.osoNumberProfile.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="number_oso_number_profiles">
            @includeIf('admin.osoNumbers.relationships.numberOsoNumberProfiles', ['osoNumberProfiles' => $osoNumber->numberOsoNumberProfiles])
        </div>
    </div>
</div>

@endsection