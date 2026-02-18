@extends('layouts.admin')
@section('content')
    @can('project_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Project', 'route' => 'admin.projects.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="card card-flush">
        <div class="card-header mt-6">
            {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="row g-6 g-xl-9">
                @foreach($projects as $key => $project)
                    <div class="col-md-6 col-xl-4">
                        <x-metronic.project-card title="{{ $project->name }}"
                            description="{{ Str::limit($project->description, 100) }}"
                            status="{{ $project->status->name ?? 'Unknown' }}"
                            statusColor="{{ $project->status->name === 'Completed' ? 'success' : ($project->status->name === 'In Progress' ? 'primary' : 'warning') }}"
                            date="{{ $project->start_date }}" budget="{{ $project->budget }}" progress="50" :users="[]"
                            class="h-100" href="{{ route('admin.projects.show', $project->id) }}" />
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col">
                    {{ $projects->links() }}
                </div>
            </div>



        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('project_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.projects.massDestroy') }}",
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
                                headers: { 'x-csrf-token': _token },
                                method: 'POST',
                                url: config.url,
                                data: { ids: ids, _method: 'DELETE' }
                            })
                                .done(function () { location.reload() })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            /*  $.extend(true, $.fn.dataTable.defaults, {
              orderCellsTop: true,
              order: [[ 1, 'desc' ]],
              pageLength: 100,
            });
            /*  let table = $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection