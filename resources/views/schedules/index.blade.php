<?php

use App\Common;
use App\Schedule;

?>
@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('schedule.create')}}">
                {{ trans('global.add') }} {{ trans('cruds.schedule.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.schedule.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Schedule">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>No.</th>
                        <th>Plan_ID</th>
                        <th>Day_Number</th>
                        <th>Start_Time</th>
                        <th>Title</th>
                        <th>Full_Description</th>
                        <th>Actions</th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $i => $schedule)
                        <tr data-entry-id="{{ $schedule->id }}">
                            <td>

                            </td>
                            <td class="table-text">
                                <div>
                                <a href="{{ route('schedule.show', $schedule->id) }}">{{ $i+1 }}</a>
                                </div>
                            </td>
                            <td class="table-text">
                                <div><a href="{{ route('schedule.show', $schedule->id) }}">{{ $schedule->title }}</a></div>
                            </td>
                            <td class="table-text">
                                <div>{{ $schedule->day_number }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $schedule->start_time }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $schedule->title }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $schedule->full_description }}</div>
                            </td>
                            <td class="table-text">
                                <a class="btn btn-xs btn-primary" href="{{ route('schedule.show', $schedule->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('schedule.edit', $schedule->id) }}">
                                    Edit
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('schedule.delete', $schedule->id) }}">
                                    Delete
                                </a>
                            </td>
                            </div>
                            </td>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.schedule.massDestroy') }}",
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


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Schedule:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
