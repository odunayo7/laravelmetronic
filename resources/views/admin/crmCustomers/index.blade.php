@extends('layouts.admin')
@section('content')
    @can('crm_customer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.crm-customers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.crmCustomer.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'CrmCustomer', 'route' => 'admin.crm-customers.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.crmCustomer.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.crmCustomer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.skype') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crmCustomers as $key => $crmCustomer)
                        <tr data-entry-id="{{ $crmCustomer->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $crmCustomer->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $crmCustomer->id ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->email ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->address ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->skype ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->website ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->description ?? '' }}
                            </td>
                            <td>
                                @can('crm_customer_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.crm-customers.show', $crmCustomer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('crm_customer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.crm-customers.edit', $crmCustomer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('crm_customer_delete')
                                    <form action="{{ route('admin.crm-customers.destroy', $crmCustomer->id) }}" method="POST"
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
                {{ $crmCustomers->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('crm_customer_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.crm-customers.massDestroy') }}",
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
            /*  let table = $('.datatable-CrmCustomer:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection