@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.hotels.create") }}">
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
                        <th>
                            {{ trans('cruds.hotel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotel.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotel.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotel.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotel.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotel.fields.rating') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $key => $hotel)
                        <tr data-entry-id="{{ $hotel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hotel->id ?? '' }}
                            </td>
                            <td>
                                {{ $hotel->name ?? '' }}
                            </td>
                            <td>
                                @if($hotel->photo)
                                    <a href="{{ $hotel->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $hotel->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $hotel->address ?? '' }}
                            </td>
                            <td>
                                {{ $hotel->description ?? '' }}
                            </td>
                            <td>
                                {{ $hotel->rating ?? '' }}
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hotels.show', $hotel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hotels.edit', $hotel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="DELETE" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>


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
