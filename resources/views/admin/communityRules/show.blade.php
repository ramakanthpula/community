@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.communityRule.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-rules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.communityRule.fields.id') }}
                        </th>
                        <td>
                            {{ $communityRule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityRule.fields.apartment_policies') }}
                        </th>
                        <td>
                            {!! $communityRule->apartment_policies !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityRule.fields.code_of_conduct') }}
                        </th>
                        <td>
                            {!! $communityRule->code_of_conduct !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-rules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection