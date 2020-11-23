@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.emplpyee.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.emplpyees.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.emplpyees.index') }}">
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