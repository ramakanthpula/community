@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.helpDesk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.help-desks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.id') }}
                        </th>
                        <td>
                            {{ $helpDesk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.name') }}
                        </th>
                        <td>
                            {{ $helpDesk->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.mobile') }}
                        </th>
                        <td>
                            {{ $helpDesk->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.flat_no') }}
                        </th>
                        <td>
                            {{ $helpDesk->flat_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.timestamp') }}
                        </th>
                        <td>
                            {{ $helpDesk->timestamp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.enquiry_type') }}
                        </th>
                        <td>
                            @foreach($helpDesk->enquiry_types as $key => $enquiry_type)
                                <span class="label label-info">{{ $enquiry_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.details') }}
                        </th>
                        <td>
                            {{ $helpDesk->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.helpDesk.fields.description') }}
                        </th>
                        <td>
                            {{ $helpDesk->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.help-desks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection