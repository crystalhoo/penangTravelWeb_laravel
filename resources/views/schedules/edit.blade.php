<?php

use App\Common;
use App\Plan;
use App\Schedule;

?>
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.schedule.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('schedule.update', [$schedule->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
            </div>
            <div class="form-group {{ $errors->has('day_number') ? 'has-error' : '' }}">
                <label for="day_number">{{ trans('cruds.schedule.fields.day_number') }}*</label>
                <input type="number" id="day_number" name="day_number" class="form-control" value="{{ old('day_number', isset($schedule) ? $schedule->day_number : '') }}" step="1" required>
                @if($errors->has('day_number'))
                    <p class="help-block">
                        {{ $errors->first('day_number') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.schedule.fields.day_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="start_date">{{ trans('cruds.schedule.fields.start_date') }}*</label>
                <input type="text" id="start_date" name="start_date" class="form-control datepicker" value="{{ old('start_date', isset($schedule) ? $schedule->start_date : '') }}" required>
                @if($errors->has('start_date'))
                    <p class="help-block">
                        {{ $errors->first('start_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.schedule.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                <label for="full_description">{{ trans('Full Description*') }}</label>
                <input type="text" id="full_description" name="full_description" class="form-control" value="{{ old('full_description', isset($schedule) ? $schedule->full_description : '') }}">
                @if($errors->has('full_description'))
                    <p class="help-block">
                        {{ $errors->first('full_description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tourguide') ? 'has-error' : '' }}">
                <label for="tourguide">{{ trans('Tour Guide*') }}</label>
                <input type="text" id="tourguide" name="tourguide" class="form-control" value="{{ old('tourguide', isset($schedule) ? $schedule->tourguide : '') }}">
                @if($errors->has('tourguide'))
                    <p class="help-block">
                        {{ $errors->first('tourguide') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('') }}
                </p>
            </div>
            <!-- Plan ID -->
            <div class="form-group row">
                {!! Form::label('plan-id', 'Plan ID*', [
                'class' => 'control-label col-sm-3',
                ]) !!}
            <div class="col-sm-9">
                {!! Form::select('plan_id',
                Plan::pluck('title', 'id'),
                null, [
                'class' => 'form-control',
                'placeholder' => '- Select Plan -',
                ]) !!}
            </div>
            </div>

            <div class="form-group row">
                {!! Form::label('Hotels') !!}
            <div class="col-sm-9">
                {!! Form::select('hotels[]',
                $hotels,
                null,
                ['class' => 'form-control',
                'multiple' => 'multiple']) !!}
            </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
