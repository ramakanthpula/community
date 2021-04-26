@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purposeOfVisit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purpose-of-visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purposeOfVisit.fields.id') }}
                        </th>
                        <td>
                            {{ $purposeOfVisit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purposeOfVisit.fields.name') }}
                        </th>
                        <td>
                            {{ $purposeOfVisit->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purpose-of-visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection