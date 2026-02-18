@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('cruds.assetsHistory.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.assetsHistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.asset') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.assigned_user') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assetsHistories as $key => $assetsHistory)
                        <tr data-entry-id="{{ $assetsHistory->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $assetsHistory->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $assetsHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->asset->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->location->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->assigned_user->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->created_at ?? '' }}
                            </td>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $assetsHistory->id }}" />
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                {{ $assetsHistories->links() }}
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
            /*  let table = $('.datatable-AssetsHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection