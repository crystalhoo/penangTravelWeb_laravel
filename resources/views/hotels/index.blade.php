<?php

use App\Common;
use App\Hotel;

?>
@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
@if (count($hotels) > 0)
<table class="table table-striped task-table">
<!-- Table Headings -->
<thead>
<tr>
<th>No.</th>
<th>Name</th>
<th>Address</th>
<th>Description</th>
<th>Rating</th>
<th>Actions</th>
</tr>
</thead>

<!-- Table Body -->
<tbody>
@foreach ($hotels as $i => $hotel)
<tr>
<td class="table-text">
<div>
<a href="{{ route('hotel.show', $hotel->id) }}">{{ $i+1 }}</a>
</div>
</td>
<td class="table-text">
<div><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>
</td>
<td class="table-text">
<div>{{ $hotel->address }}</div>
</td>
<td class="table-text">
<div>{{ $hotel->description }}</div>
</td>
<td class="table-text">
<div>{{ $hotel->rating }}</div>
</td>
<td class="table-text">
<a href="{{ route('hotel.edit', $hotel->id) }}">Edit</a>
<a>/</a>
<a href="{{ route('hotel.delete', $hotel->id) }}">Delete</a>
</td>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
@else
<div>
No records found
</div>
@endif
</div>
@endsection