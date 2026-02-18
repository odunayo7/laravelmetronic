@extends('layouts.admin')
@section('content')
@can('test_answer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.test-answers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.testAnswer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TestAnswer', 'route' => 'admin.test-answers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('cruds.testAnswer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead><tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0"><tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.test_result') }}
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.option') }}
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.is_correct') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testAnswers as $key => $testAnswer)
                        <tr data-entry-id="{{ $testAnswer->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $testAnswer->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $testAnswer->id ?? '' }}
                            </td>
                            <td>
                                {{ $testAnswer->test_result->score ?? '' }}
                            </td>
                            <td>
                                {{ $testAnswer->question->question_text ?? '' }}
                            </td>
                            <td>
                                {{ $testAnswer->option->option_text ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $testAnswer->is_correct ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $testAnswer->is_correct ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('test_answer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.test-answers.show', $testAnswer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('test_answer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.test-answers.edit', $testAnswer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('test_answer_delete')
                                    <form action="{{ route('admin.test-answers.destroy', $testAnswer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
{{ $testAnswers->links() }}
</div>
</div>



    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  /*  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)  */
@can('test_answer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.test-answers.massDestroy') }}",
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
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
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
  /*  let table = $('.datatable-TestAnswer:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });  */
  
})

</script>
@endsection