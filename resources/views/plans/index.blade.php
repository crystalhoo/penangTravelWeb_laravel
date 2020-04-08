<?php

use App\Common;
use App\Plan;

?>
@extends('layouts.admin')

@section('content')

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('plan.create')}}">
                {{ trans('global.add') }} {{ trans('Plan') }}
            </a>
        </div>
    </div>
    <div class="card">
    <div class="card-header">
        {{ trans('Plan') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Plan">
                <thead>
                    <tr>
                        <!-- <th width="10">
                        </th> -->
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($plans as $i => $plan)
                        <tr data-entry-id="{{ $plan->id }}">
                            <!-- <td>

                            </td> -->
                            <td class="table-text">
                                <div>
                                    <a href="{{ route('plan.show', $plan->id) }}">{{ $i+1 }}</a>
                                </div>
                            </td>
                            <td class="table-text">
                                <div><a href="{{ route('plan.show', $plan->id) }}">{{ $plan->title }}</a></div>
                            </td>
                            <td class="table-text">
                                <div>{{ $plan->description }}</div>
                            </td>
                            <td class="table-text">
                                <a class="btn btn-xs btn-primary" href="{{ route('plan.show', $plan->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('plan.edit', $plan->id) }}">
                                    Edit
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('plan.delete', $plan->id) }}">
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
        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        $('.datatable-Plan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
    })

</script>
@endsection
