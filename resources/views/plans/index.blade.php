<?php

use App\Common;
use App\Plan;

?>
@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
@if (count($plans) > 0)
<table class="table table-striped task-table">
<!-- Table Headings -->
<thead>
<tr>
<th>No.</th>
<th>Title</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>

<!-- Table Body -->
<tbody>
@foreach ($plans as $i => $plan)
<tr>
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
<a href="{{ route('plan.edit', $plan->id) }}">Edit</a>
<a>/</a>
<a href="{{ route('plan.delete', $plan->id) }}">Delete</a>
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