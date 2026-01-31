@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.expense.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="expense_category_id">{{ trans('cruds.expense.fields.expense_category') }}</label>
                <select class="form-control select2 {{ $errors->has('expense_category') ? 'is-invalid' : '' }}" name="expense_category_id" id="expense_category_id">
                    @foreach($expense_categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('expense_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('expense_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.expense_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.expense.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.expense.fields.details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{!! old('details') !!}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expense_date">{{ trans('cruds.expense.fields.expense_date') }}</label>
                <input class="form-control datetime {{ $errors->has('expense_date') ? 'is-invalid' : '' }}" type="text" name="expense_date" id="expense_date" value="{{ old('expense_date') }}" required>
                @if($errors->has('expense_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.expense_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expense_month">{{ trans('cruds.expense.fields.expense_month') }}</label>
                <input class="form-control {{ $errors->has('expense_month') ? 'is-invalid' : '' }}" type="number" name="expense_month" id="expense_month" value="{{ old('expense_month', '') }}" step="1">
                @if($errors->has('expense_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.expense_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expense_year">{{ trans('cruds.expense.fields.expense_year') }}</label>
                <input class="form-control {{ $errors->has('expense_year') ? 'is-invalid' : '' }}" type="number" name="expense_year" id="expense_year" value="{{ old('expense_year', '') }}" step="1">
                @if($errors->has('expense_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.expense_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expense_reference">{{ trans('cruds.expense.fields.expense_reference') }}</label>
                <input class="form-control {{ $errors->has('expense_reference') ? 'is-invalid' : '' }}" type="text" name="expense_reference" id="expense_reference" value="{{ old('expense_reference', '') }}">
                @if($errors->has('expense_reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.expense_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.expense.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', '') }}">
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_proof">{{ trans('cruds.expense.fields.payment_proof') }}</label>
                <div class="needsclick dropzone {{ $errors->has('payment_proof') ? 'is-invalid' : '' }}" id="payment_proof-dropzone">
                </div>
                @if($errors->has('payment_proof'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_proof') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.payment_proof_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_proof_details">{{ trans('cruds.expense.fields.payment_proof_details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('payment_proof_details') ? 'is-invalid' : '' }}" name="payment_proof_details" id="payment_proof_details">{!! old('payment_proof_details') !!}</textarea>
                @if($errors->has('payment_proof_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_proof_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.payment_proof_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_by">{{ trans('cruds.expense.fields.paid_by') }}</label>
                <input class="form-control {{ $errors->has('paid_by') ? 'is-invalid' : '' }}" type="text" name="paid_by" id="paid_by" value="{{ old('paid_by', '') }}">
                @if($errors->has('paid_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.paid_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.expense.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="updated_by_id">{{ trans('cruds.expense.fields.updated_by') }}</label>
                <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                    @foreach($updated_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('updated_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('updated_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.updated_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="teacher_id">{{ trans('cruds.expense.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id">
                    @foreach($teachers as $id => $entry)
                        <option value="{{ $id }}" {{ old('teacher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.teacher_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.expenses.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $expense->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedPaymentProofMap = {}
Dropzone.options.paymentProofDropzone = {
    url: '{{ route('admin.expenses.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="payment_proof[]" value="' + response.name + '">')
      uploadedPaymentProofMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPaymentProofMap[file.name]
      }
      $('form').find('input[name="payment_proof[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($expense) && $expense->payment_proof)
      var files = {!! json_encode($expense->payment_proof) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="payment_proof[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection