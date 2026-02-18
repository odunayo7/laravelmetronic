@extends('layouts.admin')
@section('content')
@can('income_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.incomes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.income.title_singular') }}
            </a>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Income', 'route' => 'admin.incomes.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('cruds.income.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.income.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.income_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.entry_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomes as $key => $income)
                        <tr data-entry-id="{{ $income->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $income->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $income->id ?? '' }}
                            </td>
                            <td>
                                {{ $income->income_category->name ?? '' }}
                            </td>
                            <td>
                                {{ $income->entry_date ?? '' }}
                            </td>
                            <td>
                                {{ $income->amount ?? '' }}
                            </td>
                            <td>
                                {{ $income->description ?? '' }}
                            </td>
                            <td>
                                @can('income_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.incomes.show', $income->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('income_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.incomes.edit', $income->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('income_delete')
                                    <form action="{{ route('admin.incomes.destroy', $income->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
{{ $incomes->links() }}
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
@can('income_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.incomes.massDestroy') }}",
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
  /*  let table = $('.datatable-Income:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });  */
  
})

</script>
@endsection