@can('student_basic_info_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.student-basic-infos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.studentBasicInfo.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.studentBasicInfo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-classStudentBasicInfos">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.roll') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.joining_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.subject') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentBasicInfos as $key => $studentBasicInfo)
                        <tr data-entry-id="{{ $studentBasicInfo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $studentBasicInfo->id ?? '' }}
                            </td>
                            <td>
                                {{ $studentBasicInfo->roll ?? '' }}
                            </td>
                            <td>
                                {{ $studentBasicInfo->first_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StudentBasicInfo::GENDER_RADIO[$studentBasicInfo->gender] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StudentBasicInfo::STATUS_SELECT[$studentBasicInfo->status] ?? '' }}
                            </td>
                            <td>
                                {{ $studentBasicInfo->joining_date ?? '' }}
                            </td>
                            <td>
                                {{ $studentBasicInfo->user->name ?? '' }}
                            </td>
                            <td>
                                @foreach($studentBasicInfo->subjects as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('student_basic_info_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.student-basic-infos.show', $studentBasicInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('student_basic_info_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.student-basic-infos.edit', $studentBasicInfo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('student_basic_info_delete')
                                    <form action="{{ route('admin.student-basic-infos.destroy', $studentBasicInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('student_basic_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.student-basic-infos.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-classStudentBasicInfos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection