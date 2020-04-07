<?php

use App\Common;
use App\Hotel;

?>
@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hotel.create')}}">
                {{ trans('global.add') }} {{ trans('cruds.hotel.title_singular') }}
            </a>
        </div>
    </div>

 <div class="card">
    <div class="card-header">
        {{ trans('cruds.hotel.title_singular') }} {{ trans('global.list') }}
    </div>

<div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Hotel">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Actions</th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($hotels as $i => $hotel)
                        <tr data-entry-id="{{ $hotel->id }}">
                            <td>

                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{ route('hotel.show', $hotel->id) }}">{{ $i+1 }}</a>
                                </div>
                            </td>
                            <td class="table-text">
                                <div><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>
                            </td>
                            <td class="table-text">
                                <div>{{ $hotel->address }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $hotel->description }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $hotel->rating }}</div>
                            </td>
                            <td class="table-text">
                                <a class="btn btn-xs btn-primary" href="{{ route('hotel.show', $hotel->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('hotel.edit', $hotel->id) }}">
                                    Edit
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('hotel.delete', $hotel->id) }}">
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
    url: "{{ route('admin.hotel.massDestroy') }}",
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
  $('.datatable-Hotel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
