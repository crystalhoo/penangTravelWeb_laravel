<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
<table class="table table-striped task-table">
<!-- Table Headings -->
<thead>
<tr>
<th>Attribute</th>
<th>Value</th>
</tr>
</thead>
<!-- Table Body -->
<tbody>
<tr>
<td>Code</td>
<td>{{ $division->code }}</td>
</tr>
<tr>
<td>Name</td>
<td>{{ $division->name }}</td>
</tr>
<tr>
<td>Address</td>
<td>{!! nl2br($division->address) !!}</td>
</tr>
<tr>
<td>Postcode</td>
<td>{{ $division->postcode }}</td>
</tr>
<tr>
<td>City</td>
<td>{{ $division->city }}</td>
</tr>
<tr>
<td>State</td>
<td>{{ Common::$states[$division->state] }}</td>
</tr>
<tr>
<td>Created</td>
<td>{{ $division->created_at }}</td>
</tr>
</tbody>
</table>
</div>
@endsection