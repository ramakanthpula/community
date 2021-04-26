@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addWorkman.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-workmen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.id') }}
                        </th>
                        <td>
                            {{ $addWorkman->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.name') }}
                        </th>
                        <td>
                            {{ $addWorkman->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $addWorkman->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\AddWorkman::CATEGORY_RADIO[$addWorkman->category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.skilled') }}
                        </th>
                        <td>
                            {{ $addWorkman->skilled->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.address_line_1') }}
                        </th>
                        <td>
                            {{ $addWorkman->address_line_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.address_line_2') }}
                        </th>
                        <td>
                            {{ $addWorkman->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.city') }}
                        </th>
                        <td>
                            {{ $addWorkman->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.father_husband') }}
                        </th>
                        <td>
                            {{ $addWorkman->father_husband }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\AddWorkman::GENDER_SELECT[$addWorkman->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.pin_code') }}
                        </th>
                        <td>
                            {{ $addWorkman->pin_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.date_of_joining') }}
                        </th>
                        <td>
                            {{ $addWorkman->date_of_joining }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.aadhaar_number') }}
                        </th>
                        <td>
                            {{ $addWorkman->aadhaar_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.blood_group') }}
                        </th>
                        <td>
                            {{ App\Models\AddWorkman::BLOOD_GROUP_SELECT[$addWorkman->blood_group] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.photo') }}
                        </th>
                        <td>
                            {{ $addWorkman->photo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addWorkman.fields.vehicle_number') }}
                        </th>
                        <td>
                            {{ $addWorkman->vehicle_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-workmen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection