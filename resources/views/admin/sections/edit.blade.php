@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.update", [$section->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="section_name">{{ trans('cruds.section.fields.section_name') }}</label>
                <input class="form-control {{ $errors->has('section_name') ? 'is-invalid' : '' }}" type="text" name="section_name" id="section_name" value="{{ old('section_name', $section->section_name) }}" required>
                @if($errors->has('section_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('section_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="section_code">{{ trans('cruds.section.fields.section_code') }}</label>
                <input class="form-control {{ $errors->has('section_code') ? 'is-invalid' : '' }}" type="text" name="section_code" id="section_code" value="{{ old('section_code', $section->section_code) }}">
                @if($errors->has('section_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('section_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_code_helper') }}</span>
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