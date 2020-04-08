@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.schedule.title_singular') }}
    </div>

    <div class="card-body">
        <form action= "{{ route("admin.schedules.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
                <label for="plan_id">{{ trans('Plan ID') }}*</label>
                <input type="number" id="plan_id" name="plan_id" class="form-control" value="{{ old('plan_id', isset($schedule) ? $schedule->plan_id : '') }}" step="1" required>
                @if($errors->has('plan_id'))
                    <p class="help-block">
                        {{ $errors->first('plan_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.schedule.fields.plan_id_helper') }}
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('day_number') ? 'has-error' : '' }}">
                <label for="day_number">{{ trans('cruds.schedule.fields.day_number') }}*</label>
                <input type="number" id="day_number" name="day_number" class="form-control" value="{{ old('day_number', isset($schedule) ? $schedule->day_number : '') }}" step="1" required>
                @if($errors->has('day_number'))
                    <p class="help-block">
                        {{ $errors->first('day_number') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.schedule.fields.day_number_helper') }}
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.schedule.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control timepicker" value="{{ old('start_time', isset($schedule) ? $schedule->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <p class="help-block">
                        {{ $errors->first('start_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.schedule.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.schedule.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($schedule) ? $schedule->title : '') }}" required>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.schedule.fields.title_helper') }}
                </p>
            </div><div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                <label for="full_description">{{ trans('Full Description') }}*</label>
                <input type="text" id="full_description" name="full_description" class="form-control" value="{{ old('full_description', isset($schedule) ? $schedule->full_description : '') }}" required>
                @if($errors->has('full_description'))
                    <p class="help-block">
                        {{ $errors->first('full_description') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.schedule.fields.full_description_helper') }}
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
                <label for="plan">{{ trans('cruds.schedule.fields.plan') }}</label>
                <select name="plan_id" id="plan" class="form-control select2">
                    @foreach($plans ?? '' as $id => $plan)
                        <option value="{{ $id }}" {{ (isset($schedule) && $schedule->plan ? $schedule->plan->id : old('plan_id')) == $id ? 'selected' : '' }}>{{ $plan }}</option>
                    @endforeach
                </select>
                @if($errors->has('plan_id'))
                    <p class="help-block">
                        {{ $errors->first('plan_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.schedule.fields.plan_id_helper') }}
                </p> -->
            </div>
            

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
