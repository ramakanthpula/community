@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.communityAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $communityAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.email') }}
                        </th>
                        <td>
                            {{ $communityAdmin->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $communityAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.contact') }}
                        </th>
                        <td>
                            {{ $communityAdmin->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.password') }}
                        </th>
                        <td>
                            {{ $communityAdmin->password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityAdmin.fields.photo') }}
                        </th>
                        <td>
                            @if($communityAdmin->photo)
                                <a href="{{ $communityAdmin->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $communityAdmin->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection