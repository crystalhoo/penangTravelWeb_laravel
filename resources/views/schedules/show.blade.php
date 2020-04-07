@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.schedule.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.id') }}
                        </th>
                        <td>
                            {{ $schedule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.day_number') }}
                        </th>
                        <td>
                            {{ $schedule->day_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.start_time') }}
                        </th>
                        <td>
                            {{ $schedule->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Full Description') }}
                        </th>
                        <td>
                            {{ $schedule->full_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Tour Guide') }}
                        </th>
                        <td>
                            {{ $schedule->tourguide }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Plan ID') }}
                        </th>
                        <td>
                            {{ $schedule->plan_id }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection