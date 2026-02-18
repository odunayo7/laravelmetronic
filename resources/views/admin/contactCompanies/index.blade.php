@extends('layouts.admin')
@section('content')
    @can('contact_company_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.contact-companies.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contactCompany.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ContactCompany', 'route' => 'admin.contact-companies.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.contactCompany.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.contactCompany.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactCompany.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactCompany.fields.company_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactCompany.fields.company_website') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactCompany.fields.company_email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactCompanies as $key => $contactCompany)
                        <tr data-entry-id="{{ $contactCompany->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $contactCompany->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $contactCompany->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactCompany->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactCompany->company_address ?? '' }}
                            </td>
                            <td>
                                {{ $contactCompany->company_website ?? '' }}
                            </td>
                            <td>
                                {{ $contactCompany->company_email ?? '' }}
                            </td>
                            <td>
                                @can('contact_company_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.contact-companies.show', $contactCompany->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contact_company_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.contact-companies.edit', $contactCompany->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contact_company_delete')
                                    <form action="{{ route('admin.contact-companies.destroy', $contactCompany->id) }}" method="POST"
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
                {{ $contactCompanies->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('contact_company_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.contact-companies.massDestroy') }}",
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
            /*  let table = $('.datatable-ContactCompany:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection