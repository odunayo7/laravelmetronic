@extends('layouts.admin')
@section('content')
    @can('client_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.clients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Client', 'route' => 'admin.clients.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.skype') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $client->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $client->id ?? '' }}
                            </td>
                            <td>
                                {{ $client->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $client->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $client->company ?? '' }}
                            </td>
                            <td>
                                {{ $client->email ?? '' }}
                            </td>
                            <td>
                                {{ $client->phone ?? '' }}
                            </td>
                            <td>
                                {{ $client->website ?? '' }}
                            </td>
                            <td>
                                {{ $client->skype ?? '' }}
                            </td>
                            <td>
                                {{ $client->country ?? '' }}
                            </td>
                            <td>
                                {{ $client->status->name ?? '' }}
                            </td>
                            <td>
                                @can('client_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('client_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_delete')
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST"
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
                {{ $clients->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('client_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.clients.massDestroy') }}",
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
            /*  let table = $('.datatable-Client:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection