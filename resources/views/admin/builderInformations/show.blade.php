@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.builderInformation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.builder-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.builderInformation.fields.id') }}
                        </th>
                        <td>
                            {{ $builderInformation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.builderInformation.fields.company_name') }}
                        </th>
                        <td>
                            {{ $builderInformation->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.builderInformation.fields.builder_name') }}
                        </th>
                        <td>
                            {{ $builderInformation->builder_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.builderInformation.fields.company_phone') }}
                        </th>
                        <td>
                            {{ $builderInformation->company_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.builderInformation.fields.company_address') }}
                        </th>
                        <td>
                            {{ $builderInformation->company_address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.builder-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection