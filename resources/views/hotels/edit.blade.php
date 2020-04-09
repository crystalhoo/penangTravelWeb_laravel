<?php

use App\Common;

?>
@extends('layouts.admin')

@section('content')

<div class="card">
    <!-- <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hotel.title_singular') }}
    </div> -->

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
<!-- New hotel Form -->
{!! Form::model($hotel, [
'route' => ['hotel.update', $hotel->id],
'method' => 'put',
'class' => 'form-horizontal'
]) !!}

<!-- Code -->
<div class="form-group row">
{!! Form::label('hotel-code', 'Hotel_ID', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('code', $hotel->code, [
'id' => 'hotel-code',
'class' => 'form-control',
'maxlength' => 3,
]) !!}
</div>
</div>

<!-- Name -->
<div class="form-group row">
{!! Form::label('hotel-name', 'Name', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('name', $hotel->name, [
'id' => 'hotel-name',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<!-- Address -->
<div class="form-group row">
{!! Form::label('hotel-address', 'Address', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::textarea('address', $hotel->address, [
'id' => 'hotel-address',
'class' => 'form-control',
]) !!}
</div>
</div>


<!-- description-->
<div class="form-group row">
{!! Form::label('hotel-description', 'Description', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('description', null, [
'id' => 'hotel-description',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>


<!-- Rating-->
<div class="form-group row">
{!! Form::label('hotel-rating', 'Rating', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('rating', null, [
'id' => 'hotel-rating',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<div class="form-group row">
	{!! Form::label('Schedules','',['class' => 'control-label col-sm-3',]) !!}
<div class="col-sm-9">
	{!! Form::select('schedules[]',
	$schedules,
	null,
	['class' => 'form-control',
	'multiple' => 'multiple']) !!}
</div>
</div>

<!-- Submit Button -->
<div class="form-group row">
<div class="col-sm-offset-3 col-sm-6">
	{!! Form::button('Save', [
	'type' => 'submit',
	'class' => 'btn btn-primary',
	]) !!}
</div>
</div>
{!! Form::close() !!}
</div>

@endsection
