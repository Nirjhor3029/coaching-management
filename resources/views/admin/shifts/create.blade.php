@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shift.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shifts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="shift_name">{{ trans('cruds.shift.fields.shift_name') }}</label>
                <input class="form-control {{ $errors->has('shift_name') ? 'is-invalid' : '' }}" type="text" name="shift_name" id="shift_name" value="{{ old('shift_name', '') }}" required>
                @if($errors->has('shift_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shift_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.shift_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shift_code">{{ trans('cruds.shift.fields.shift_code') }}</label>
                <input class="form-control {{ $errors->has('shift_code') ? 'is-invalid' : '' }}" type="text" name="shift_code" id="shift_code" value="{{ old('shift_code', '') }}">
                @if($errors->has('shift_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shift_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.shift_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shift_time">{{ trans('cruds.shift.fields.shift_time') }}</label>
                <input class="form-control {{ $errors->has('shift_time') ? 'is-invalid' : '' }}" type="text" name="shift_time" id="shift_time" value="{{ old('shift_time', '') }}">
                @if($errors->has('shift_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shift_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.shift_time_helper') }}</span>
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