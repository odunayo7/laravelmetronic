@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('cruds.auditLog.title_singular') }} {{ trans('global.list') }}">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.host') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $key => $auditLog)
                        <tr data-entry-id="{{ $auditLog->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $auditLog->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $auditLog->id ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->description ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->subject_id ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->subject_type ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->user_id ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->host ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->created_at ?? '' }}
                            </td>
                            <td>
                                @can('audit_log_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.audit-logs.show', $auditLog->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                {{ $auditLogs->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */

            /*  $.extend(true, $.fn.dataTable.defaults, {
              orderCellsTop: true,
              order: [[ 1, 'desc' ]],
              pageLength: 100,
            });
            /*  let table = $('.datatable-AuditLog:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection