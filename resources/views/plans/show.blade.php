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
<th>
<div>
<a href="{{ route('plan.index', $plan->id) }}">Back to index</a>
</div>
</th>
</tr>
</thead>
<!-- Table Body -->
<tbody>
<tr>
<td>Title</td>
<td>{{ $plan->title }}</td>
</tr>
<tr>
<td>Description</td>
<td>{{ $plan->description }}</td>
</tr>
</tbody>
</table>
</div>
@endsection