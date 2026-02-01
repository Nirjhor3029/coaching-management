@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                    <div class="row">
                        @foreach($permissions as $parent)
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-sm border-0">
                                    <div class="card-header bg-light d-flex align-items-center py-2"
                                        style="border-bottom: 2px solid #5ab2f7;">
                                        <div class="custom-control custom-checkbox text-primary">
                                            <input class="custom-control-input parent-checkbox" type="checkbox"
                                                id="permission_{{ $parent->id }}" name="permissions[]" value="{{ $parent->id }}"
                                                {{ in_array($parent->id, old('permissions', [])) ? 'checked' : '' }}>
                                            <label class="custom-control-label fw-bold text-uppercase"
                                                for="permission_{{ $parent->id }}"
                                                style="font-size: 0.85rem; letter-spacing: 0.5px;">
                                                {{ str_replace('_', ' ', $parent->title) }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body py-2">
                                        @foreach($parent->children as $child)
                                            <div class="custom-control custom-checkbox ml-2 mb-1">
                                                <input class="custom-control-input child-checkbox permission-item" type="checkbox"
                                                    id="permission_{{ $child->id }}" name="permissions[]" value="{{ $child->id }}"
                                                    data-parent-id="permission_{{ $parent->id }}" {{ in_array($child->id, old('permissions', [])) ? 'checked' : '' }}>
                                                <label class="custom-control-label text-muted" for="permission_{{ $child->id }}"
                                                    style="font-size: 0.85rem;">
                                                    {{ str_replace('_', ' ', $child->title) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($errors->has('permissions'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('permissions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
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