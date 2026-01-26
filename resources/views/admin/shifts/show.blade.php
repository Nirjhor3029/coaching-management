@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shift.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.id') }}
                        </th>
                        <td>
                            {{ $shift->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.shift_name') }}
                        </th>
                        <td>
                            {{ $shift->shift_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.shift_code') }}
                        </th>
                        <td>
                            {{ $shift->shift_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.shift_time') }}
                        </th>
                        <td>
                            {{ $shift->shift_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
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
            <a class="nav-link" href="#class_shift_academic_classes" role="tab" data-toggle="tab">
                {{ trans('cruds.academicClass.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="class_shift_academic_classes">
            @includeIf('admin.shifts.relationships.classShiftAcademicClasses', ['academicClasses' => $shift->classShiftAcademicClasses])
        </div>
    </div>
</div>

@endsection