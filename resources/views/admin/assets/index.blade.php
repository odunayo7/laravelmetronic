@extends('layouts.admin')
@section('content')
    @can('asset_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.assets.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.asset.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Asset', 'route' => 'admin.assets.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.asset.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.asset.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.serial_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.photos') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.assigned_to') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $key => $asset)
                        <tr data-entry-id="{{ $asset->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $asset->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $asset->id ?? '' }}
                            </td>
                            <td>
                                {{ $asset->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $asset->serial_number ?? '' }}
                            </td>
                            <td>
                                {{ $asset->name ?? '' }}
                            </td>
                            <td>
                                @foreach($asset->photos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $asset->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $asset->location->name ?? '' }}
                            </td>
                            <td>
                                {{ $asset->notes ?? '' }}
                            </td>
                            <td>
                                {{ $asset->assigned_to->name ?? '' }}
                            </td>
                            <td>
                                @can('asset_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assets.show', $asset->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('asset_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assets.edit', $asset->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('asset_delete')
                                    <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST"
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
                {{ $assets->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('asset_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.assets.massDestroy') }}",
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
            /*  let table = $('.datatable-Asset:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection