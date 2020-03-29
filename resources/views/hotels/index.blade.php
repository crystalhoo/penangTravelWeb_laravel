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
<th>Membership No</th>
<th>NRIC</th>
<th>Name</th>
<th>Gender</th>
<th>Address</th>
<th>Postcode</th>
<th>City</th>
<th>State</th>
<th>Phone</th>
<th>Division Id</th>
<th>Action</th>
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
<!-- <div> -->
<!-- {!! link_to_route(
'hotel.show',
$title = $hotel->hotel,
$parameters = [
'id' => $hotel->id,
]
) !!} -->
<!-- </div> -->
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
<div>
{!! link_to_route(
'hotel.edit',
$title = 'Edit',
$parameters = [
'id' => $hotel->id,
]
) !!}
<!--
{!!
Form::open(['method' => 'DELETE', 'route' => ['member.destroy', $member->id]]) 
!!}
{!!
Form::submit('Delete')
!!}
-->
<a href="{{ route('hotel.delete', $hotel->id) }}">Delete</a>
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