<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')

<div class="panel-body">
<!-- New Division Form -->
{!! Form::model($hotel, [
'route' => ['hotel.store'],
'class' => 'form-horizontal'
]) !!}

<!-- Name -->
<div class="form-group row">
{!! Form::label('hotel-name', 'Name', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('name', null, [
'id' => 'hotel-name',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<!-- address-->
<div class="form-group row">
{!! Form::label('hotel-address', 'Address', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('address', null, [
'id' => 'hotel-address',
'class' => 'form-control',
'maxlength' => 100,
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