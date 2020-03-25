@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.faqs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.faq.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.faq.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Faq">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.faq.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.faq.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.faq.fields.answer') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $key => $faq)
                        <tr data-entry-id="{{ $faq->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $faq->id ?? '' }}
                            </td>
                            <td>
                                {{ $faq->question ?? '' }}
                            </td>
                            <td>
                                {{ $faq->answer ?? '' }}
                            </td>
                            <td>
                              
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.faqs.show', $faq->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                              

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.faqs.edit', $faq->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                

                                
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Faq:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
