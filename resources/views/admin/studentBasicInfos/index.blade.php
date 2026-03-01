@extends('layouts.admin')
@section('content')
    @can('student_basic_info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.student-basic-infos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.studentBasicInfo.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', [
                    'model' => 'StudentBasicInfo',
                    'route' => 'admin.student-basic-infos.parseCsvImport',
                ])
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.studentBasicInfo.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-StudentBasicInfo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.id_no') }}
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
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('student_basic_info_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.student-basic-infos.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.student-basic-infos.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id_no',
                        name: 'id'
                    },
                    {
                        data: 'roll',
                        name: 'roll'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'joining_date',
                        name: 'joining_date',
                        render: function(data, type, row) {
                            if (!data) {
                                return '';
                            }

                            if (type !== 'display' && type !== 'filter') {
                                return data;
                            }

                            let parsed = new Date(data.replace(' ', 'T'));
                            if (isNaN(parsed.getTime())) {
                                return data;
                            }

                            let day = String(parsed.getDate()).padStart(2, '0');
                            let month = parsed.toLocaleString('en-US', {
                                month: 'short'
                            });
                            let year = parsed.getFullYear();

                            return `${day} ${month}, ${year}`;
                        }
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'subject',
                        name: 'subjects.name'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-StudentBasicInfo').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
