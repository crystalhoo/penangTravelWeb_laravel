<?php

use App\Common;
use App\Hotel;

?>
<!-- @extends('layouts.app')

@section('content') -->
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
@if (count($hotels) > 0)
<table class="table table-striped task-table">
<!-- Table Headings -->
<thead>
<tr>
<th>No.</th>
<th>Name</th>
<th>Description</th>
<th>Rating</th>
</tr>
</thead>

<!-- Table Body -->
<tbody>
@foreach ($hotels as $i => $hotel)
<tr>
<td class="table-text">
<div>{{ $i+1 }}</div>
</td>
<td class="table-text">

</td>
<td class="table-text">
<div>{{ $hotel->name }}</div>
</td>
<td class="table-text">
<div>{{ $hotel->description }}</div>
</td>
<td class="table-text">
<div>{{ $hotel->rating }}</div>
</td>

<td class="table-text">
<div>{{ Hotel::pluck('name','id')[$hotel->id] }}</div>
</td>
<td class="table-text">
<div></div>
</td>
<td class="table-text">

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