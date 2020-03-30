<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
<!-- editing plan Form -->
{!! Form::model($plan, [
'route' => ['plan.update', $plan->id],
'method' => 'put',
'class' => 'form-horizontal'
]) !!}

<!-- Code -->
<div class="form-group row">
{!! Form::label('plan-code', 'Code', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('code', $plan->code, [
'id' => 'plan-code',
'class' => 'form-control',
'maxlength' => 3,
]) !!}
</div>
</div>

<!-- Title -->
<div class="form-group row">
{!! Form::label('plan-title', 'Title', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('title', $plan->title, [
'id' => 'plan-title',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<!-- description-->
<div class="form-group row">
{!! Form::label('plan-description', 'Description', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('description', null, [
'id' => 'plan-description',
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