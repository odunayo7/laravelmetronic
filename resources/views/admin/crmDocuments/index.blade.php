@extends('layouts.admin')
@section('content')
    @can('crm_document_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.crm-documents.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.crmDocument.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'CrmDocument', 'route' => 'admin.crm-documents.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.crmDocument.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.crmDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.document_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crmDocuments as $key => $crmDocument)
                        <tr data-entry-id="{{ $crmDocument->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $crmDocument->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $crmDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $crmDocument->customer->first_name ?? '' }}
                            </td>
                            <td>
                                @if($crmDocument->document_file)
                                    <a href="{{ $crmDocument->document_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $crmDocument->name ?? '' }}
                            </td>
                            <td>
                                {{ $crmDocument->description ?? '' }}
                            </td>
                            <td>
                                @can('crm_document_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.crm-documents.show', $crmDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('crm_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.crm-documents.edit', $crmDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('crm_document_delete')
                                    <form action="{{ route('admin.crm-documents.destroy', $crmDocument->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
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
        <div class="row">
            <div class="col">
                {{ $crmDocuments->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('crm_document_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.crm-documents.massDestroy') }}",
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
            /*  let table = $('.datatable-CrmDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection