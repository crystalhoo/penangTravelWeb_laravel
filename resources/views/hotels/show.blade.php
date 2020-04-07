<?php

use App\Common;

?>
@extends('layouts.admin')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
<table class="table table-striped task-table">
<!-- Table Headings -->
<thead>
<tr>
<th>
<div>
<a href="{{ route('hotel.index', $hotel->id) }}">Back to index</a>
</div>
</th>
</tr>
</thead>
<!-- Table Body -->
<tbody>
<tr>
<td>Name</td>
<td>{{ $hotel->name }}</td>
</tr>
<tr>
<td>Address</td>
<td>{{ $hotel->address }}</td>
</tr>
<tr>
<td>Description</td>
<td>{{ $hotel->description }}</td>
</tr>
<tr>
<td>Rating</td>
<td>{{ $hotel->rating }}</td>
</tr>
<tr>
<td>Schedules</td>
<td>
<ul>
@foreach ($schedules as $schedule)
<li>{{ $schedule->title }}</li>
@endforeach
</ul>
</td>
</tr>
</tbody>
</table>
</div>
@endsection