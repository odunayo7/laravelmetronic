@extends('layouts.admin')
@section('content')
    @can('contact_contact_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.contact-contacts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contactContact.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ContactContact', 'route' => 'admin.contact-contacts.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.contactContact.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.contactContact.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_phone_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_phone_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_skype') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactContacts as $key => $contactContact)
                        <tr data-entry-id="{{ $contactContact->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $contactContact->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $contactContact->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->company->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_phone_1 ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_phone_2 ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_email ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_skype ?? '' }}
                            </td>
                            <td>
                                {{ $contactContact->contact_address ?? '' }}
                            </td>
                            <td>
                                @can('contact_contact_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.contact-contacts.show', $contactContact->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contact_contact_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.contact-contacts.edit', $contactContact->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contact_contact_delete')
                                    <form action="{{ route('admin.contact-contacts.destroy', $contactContact->id) }}" method="POST"
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
                {{ $contactContacts->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('contact_contact_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.contact-contacts.massDestroy') }}",
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
            /*  let table = $('.datatable-ContactContact:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection