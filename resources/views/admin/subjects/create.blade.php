@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subjects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.subject.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.subject.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_fee">{{ trans('cruds.subject.fields.monthly_fee') }}</label>
                <input class="form-control {{ $errors->has('monthly_fee') ? 'is-invalid' : '' }}" type="number" name="monthly_fee" id="monthly_fee" value="{{ old('monthly_fee', '') }}" step="0.01">
                @if($errors->has('monthly_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.monthly_fee_helper') }}</span>
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