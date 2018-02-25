@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Reserved Room List</h3>
	</div>
	<div class="box-body">
		@if(count($reserved_rooms)>0)	
		<table class="table table-striped">
			<thead>
				<th> Room Name</th>
				<th> Date</th>
				<tbody>
					@foreach($reserved_rooms as $reserved_room)
					<tr>
						<td>
							{{$reserved_room->room->first()->roomName}}	
						</td>		
						<td>
							{{$reserved_room->date}}
						</td>
					</tr>	
					@endforeach
				</tbody>
			</table>
			@else
			<h3>No reservation</h3>
			@endif
		</div>
	</div>
</div>

@endsection