@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.academicClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.academic-classes.update", [$academicClass->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="class_name">{{ trans('cruds.academicClass.fields.class_name') }}</label>
                <input class="form-control {{ $errors->has('class_name') ? 'is-invalid' : '' }}" type="text" name="class_name" id="class_name" value="{{ old('class_name', $academicClass->class_name) }}" required>
                @if($errors->has('class_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.academicClass.fields.class_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="academic_year">{{ trans('cruds.academicClass.fields.academic_year') }}</label>
                <input class="form-control date {{ $errors->has('academic_year') ? 'is-invalid' : '' }}" type="text" name="academic_year" id="academic_year" value="{{ old('academic_year', $academicClass->academic_year) }}">
                @if($errors->has('academic_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('academic_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.academicClass.fields.academic_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class_code">{{ trans('cruds.academicClass.fields.class_code') }}</label>
                <input class="form-control {{ $errors->has('class_code') ? 'is-invalid' : '' }}" type="text" name="class_code" id="class_code" value="{{ old('class_code', $academicClass->class_code) }}">
                @if($errors->has('class_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.academicClass.fields.class_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class_sections">{{ trans('cruds.academicClass.fields.class_section') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('class_sections') ? 'is-invalid' : '' }}" name="class_sections[]" id="class_sections" multiple>
                    @foreach($class_sections as $id => $class_section)
                        <option value="{{ $id }}" {{ (in_array($id, old('class_sections', [])) || $academicClass->class_sections->contains($id)) ? 'selected' : '' }}>{{ $class_section }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_sections'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_sections') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.academicClass.fields.class_section_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class_shifts">{{ trans('cruds.academicClass.fields.class_shift') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('class_shifts') ? 'is-invalid' : '' }}" name="class_shifts[]" id="class_shifts" multiple>
                    @foreach($class_shifts as $id => $class_shift)
                        <option value="{{ $id }}" {{ (in_array($id, old('class_shifts', [])) || $academicClass->class_shifts->contains($id)) ? 'selected' : '' }}>{{ $class_shift }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_shifts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_shifts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.academicClass.fields.class_shift_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection