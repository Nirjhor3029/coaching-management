@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.academicClass.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.id') }}
                        </th>
                        <td>
                            {{ $academicClass->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.class_name') }}
                        </th>
                        <td>
                            {{ $academicClass->class_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.academic_year') }}
                        </th>
                        <td>
                            {{ $academicClass->academic_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.class_code') }}
                        </th>
                        <td>
                            {{ $academicClass->class_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.class_section') }}
                        </th>
                        <td>
                            @foreach($academicClass->class_sections as $key => $class_section)
                                <span class="label label-info">{{ $class_section->section_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicClass.fields.class_shift') }}
                        </th>
                        <td>
                            @foreach($academicClass->class_shifts as $key => $class_shift)
                                <span class="label label-info">{{ $class_shift->shift_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-classes.index') }}">
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
            <a class="nav-link" href="#class_student_basic_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.studentBasicInfo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="class_student_basic_infos">
            @includeIf('admin.academicClasses.relationships.classStudentBasicInfos', ['studentBasicInfos' => $academicClass->classStudentBasicInfos])
        </div>
    </div>
</div>

@endsection