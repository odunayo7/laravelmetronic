@extends('layouts.admin')
@section('content')
    @can('question_option_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.question-options.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.questionOption.title_singular') }}
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'QuestionOption', 'route' => 'admin.question-options.parseCsvImport'])
            </div>
        </div>
    @endcan
    <x-metronic.card flush="true" title="{{ trans('cruds.questionOption.title_singular') }} {{ trans('global.list') }}">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>
                            {{ trans('cruds.questionOption.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionOption.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionOption.fields.option_text') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionOption.fields.is_correct') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionOptions as $key => $questionOption)
                        <tr data-entry-id="{{ $questionOption->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $questionOption->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $questionOption->id ?? '' }}
                            </td>
                            <td>
                                {{ $questionOption->question->question_text ?? '' }}
                            </td>
                            <td>
                                {{ $questionOption->option_text ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $questionOption->is_correct ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $questionOption->is_correct ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('question_option_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.question-options.show', $questionOption->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('question_option_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.question-options.edit', $questionOption->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('question_option_delete')
                                    <form action="{{ route('admin.question-options.destroy', $questionOption->id) }}" method="POST"
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
                {{ $questionOptions->links() }}
            </div>
        </div>
    </x-metronic.card>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
            @can('question_option_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.question-options.massDestroy') }}",
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
            /*  let table = $('.datatable-QuestionOption:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });  */

        })

    </script>
@endsection