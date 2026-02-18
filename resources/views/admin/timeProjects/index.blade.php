@extends('layouts.admin')
@section('content')
@can('time_project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.time-projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeProject.title_singular') }}
            </a>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TimeProject', 'route' => 'admin.time-projects.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('cruds.timeProject.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.timeProject.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeProject.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeProjects as $key => $timeProject)
                        <tr data-entry-id="{{ $timeProject->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $timeProject->id }}" />
                                </div>
                            </td>
                            <td>
                                {{ $timeProject->id ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->name ?? '' }}
                            </td>
                            <td>
                                @can('time_project_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.time-projects.show', $timeProject->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('time_project_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.time-projects.edit', $timeProject->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('time_project_delete')
                                    <form action="{{ route('admin.time-projects.destroy', $timeProject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
{{ $timeProjects->links() }}
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
@can('time_project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time-projects.massDestroy') }}",
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
  /*  let table = $('.datatable-TimeProject:not(.ajaxTable)').DataTable({ buttons: dtButtons })  */
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });  */
  
})

</script>
@endsection