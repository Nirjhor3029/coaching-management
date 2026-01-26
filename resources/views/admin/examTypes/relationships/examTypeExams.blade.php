@can('exam_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.exams.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.exam.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.exam.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-examTypeExams">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.exam_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.exam_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.total_marks') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.passing_mark') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.passing_grade') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.exam_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.exam.fields.exam_type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $key => $exam)
                        <tr data-entry-id="{{ $exam->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $exam->id ?? '' }}
                            </td>
                            <td>
                                {{ $exam->exam_name ?? '' }}
                            </td>
                            <td>
                                {{ $exam->subject ?? '' }}
                            </td>
                            <td>
                                {{ $exam->exam_date ?? '' }}
                            </td>
                            <td>
                                {{ $exam->total_marks ?? '' }}
                            </td>
                            <td>
                                {{ $exam->passing_mark ?? '' }}
                            </td>
                            <td>
                                {{ $exam->passing_grade->grade_name ?? '' }}
                            </td>
                            <td>
                                {{ $exam->exam_code ?? '' }}
                            </td>
                            <td>
                                {{ $exam->exam_type->type_name ?? '' }}
                            </td>
                            <td>
                                @can('exam_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.exams.show', $exam->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('exam_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.exams.edit', $exam->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('exam_delete')
                                    <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('exam_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exams.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-examTypeExams:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection