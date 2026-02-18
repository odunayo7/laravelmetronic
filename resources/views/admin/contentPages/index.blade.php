@extends('layouts.admin')
@section('content')
    @can('content_page_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.content-pages.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentPage.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ContentPage', 'route' => 'admin.content-pages.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.contentPage.title_singular') }} {{ trans('global.list') }}">
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
                            {{ trans('cruds.contentPage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.excerpt') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.featured_image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contentPages as $key => $contentPage)
                        <tr data-entry-id="{{ $contentPage->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $contentPage->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $contentPage->id ?? '' }}
                            </td>
                            <td>
                                {{ $contentPage->title ?? '' }}
                            </td>
                            <td>
                                @foreach($contentPage->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($contentPage->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $contentPage->excerpt ?? '' }}
                            </td>
                            <td>
                                @if($contentPage->featured_image)
                                    <a href="{{ $contentPage->featured_image->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $contentPage->featured_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('content_page_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.content-pages.show', $contentPage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('content_page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.content-pages.edit', $contentPage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('content_page_delete')
                                    <form action="{{ route('admin.content-pages.destroy', $contentPage->id) }}" method="POST"
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
                {{ $contentPages->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('content_page_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.content-pages.massDestroy') }}",
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
            /*  let table = $('.datatable-ContentPage:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection