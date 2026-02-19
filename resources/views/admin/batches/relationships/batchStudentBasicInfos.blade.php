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
            <table class="table table-bordered table-striped table-hover datatable datatable-batchStudentBasicInfos">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.studentBasicInfo.fields.id') }}</th>
                        <th>{{ trans('cruds.studentBasicInfo.fields.id_no') }}</th>
                        <th>{{ trans('cruds.studentBasicInfo.fields.roll') }}</th>
                        <th>{{ trans('cruds.studentBasicInfo.fields.first_name') }}</th>
                        <th>{{ trans('cruds.studentBasicInfo.fields.contact_number') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentBasicInfos as $studentBasicInfo)
                        <tr data-entry-id="{{ $studentBasicInfo->id }}">
                            <td></td>
                            <td>{{ $studentBasicInfo->id }}</td>
                            <td>{{ $studentBasicInfo->id_no }}</td>
                            <td>{{ $studentBasicInfo->roll }}</td>
                            <td>{{ trim(($studentBasicInfo->first_name ?? '') . ' ' . ($studentBasicInfo->last_name ?? '')) }}</td>
                            <td>{{ $studentBasicInfo->contact_number }}</td>
                            <td>
                                @can('student_basic_info_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.student-basic-infos.show', $studentBasicInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            $('.datatable-batchStudentBasicInfos:not(.ajaxTable)').DataTable();
        });
    </script>
@endsection

